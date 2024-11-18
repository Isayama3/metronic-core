<?php

namespace App\Providers;

use App\Base\WebSocket\Managers\ConnectionManager;
use App\Base\WebSocket\Managers\Interfaces\IConnectionManager;
use App\Base\WebSocket\Managers\Interfaces\ISubscriptionManager;
use App\Base\WebSocket\Managers\Interfaces\IUserManager;
use App\Base\WebSocket\Managers\SubscriptionManager;
use App\Base\WebSocket\Managers\UserManager;
use App\Base\WebSocket\Services\AuthService;
use App\Base\WebSocket\Channels\ChannelFactory;
use App\Base\WebSocket\Interfaces\IAuthService;
use App\Base\WebSocket\Events\EventFactory;
use App\Base\WebSocket\Requests\RequestValidationFactory;
use App\Base\WebSocket\Interfaces\IChannelFactory;
use App\Base\WebSocket\Interfaces\IEventFactory;
use App\Base\WebSocket\Interfaces\IRequestValidationFactory;
use App\Base\WebSocket\WebSocketServiceManager;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\TokenRepository;

class WebSocketServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(IRequestValidationFactory::class, function ($app) {
            return new RequestValidationFactory();
        });

        $this->app->singleton(IAuthService::class, function ($app) {
            return new AuthService($app->make(TokenRepository::class));
        });

        $this->app->singleton(IEventFactory::class, function ($app) {
            return new EventFactory();
        });

        $this->app->singleton(IChannelFactory::class, function ($app) {
            return new ChannelFactory();
        });

        $this->app->singleton(IConnectionManager::class, function ($app) {
            return new ConnectionManager();
        });

        $this->app->singleton(ISubscriptionManager::class, function ($app) {
            return new SubscriptionManager();
        });

        $this->app->singleton(IUserManager::class, function ($app) {
            return new UserManager();
        });


        $this->app->singleton(WebSocketServiceManager::class, function ($app) {
            return new WebSocketServiceManager(
                $app->make(IAuthService::class),
                $app->make(IEventFactory::class),
                $app->make(IRequestValidationFactory::class),
                $app->make(IConnectionManager::class),
                $app->make(ISubscriptionManager::class),
                $app->make(IUserManager::class),
            );
        });
    }

    public function boot()
    {
        //
    }
}
