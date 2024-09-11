<?php

namespace App\Services;

use App\Base\Models\Chat;
use App\Base\Services\BaseService;
use App\Repositories\ChatRepository;

class ChatService extends BaseService
{
    protected ChatRepository $ChatRepository;

    public function __construct(ChatRepository $ChatRepository)
    {
        parent::__construct($ChatRepository);
        $this->ChatRepository = $ChatRepository;
    }

    public function store($data)
    {
        $chat = Chat::with('messages')
            ->where(function ($q) use ($data) {
                $q->where('sender_id', $data['sender_id'])
                    ->orWhere('sender_id', $data['receiver_id']);
            })->where(function ($q) use ($data) {
                $q->where('receiver_id', $data['sender_id'])
                    ->orWhere('receiver_id', $data['receiver_id']);
            })->first();

        if (!$chat)
            $chat = parent::store($data);

        $chat->messages()->create([
            'user_id' => $data['sender_id'],
            'message' => $data['message'],
        ]);

        $chat->refresh();
        return $chat;
    }
}
