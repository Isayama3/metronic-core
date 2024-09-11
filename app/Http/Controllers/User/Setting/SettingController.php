<?php

namespace App\Http\Controllers\User\Setting;

use App\Base\Traits\Response\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\TermResource;
use App\Services\SettingService;
use Illuminate\Support\Facades\Request;

class SettingController extends Controller
{
    use ApiResponseTrait;

    protected $service;
    protected $view_path;

    public function __construct(SettingService $service)
    {
        $this->middleware('auth');
        $this->view_path = 'admin.setting.';
        $this->service = $service;
    }

    public function about()
    {
        $about = $this->service->whereKey('about');
        return $this->respondWithCollection(AboutResource::collection($about), false);
    }

    public function terms()
    {
        $terms = $this->service->whereKey('terms');
        return $this->respondWithCollection(TermResource::collection($terms), false);
    }
}
