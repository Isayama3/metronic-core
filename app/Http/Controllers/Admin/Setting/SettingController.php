<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Http\Requests\Admin\MainConfigRequest;
use App\Http\Requests\Admin\TermRequest;
use App\Services\SettingService;
use Illuminate\Support\Facades\Request;

class SettingController extends Controller
{
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
        $update_route = str_replace('edit', 'update', Request::route()->getName());
        return view('admin.settings.about', compact('about', 'update_route'));
    }
    public function updateAbout(AboutRequest $request)
    {
        $about = $this->service->updateManyByKey($request->about, 'about');
        $update_route = str_replace('edit', 'update', Request::route()->getName());
        return view('admin.settings.about', compact('about', 'update_route'))->with('success', __('admin.successfully_updated'));
    }

    public function terms()
    {
        $terms = $this->service->whereKey('terms');
        $update_route = str_replace('edit', 'update', Request::route()->getName());
        return view('admin.settings.terms', compact('terms', 'update_route'));
    }

    public function updateTerm(TermRequest $request)
    {
        $terms = $this->service->updateManyByKey($request->terms, 'terms');
        $update_route = str_replace('edit', 'update', Request::route()->getName());
        return view('admin.settings.terms', compact('terms', 'update_route'))->with('success', __('admin.successfully_updated'));
    }

    public function mainConfig()
    {
        $main_config = $this->service->whereKey('main_config');
        $ride_request_price_percentage = $main_config->where('title', 'ride_request_price_percentage')->first()->value;
        $driver_wallet_max_balance = $main_config->where('title', 'driver_wallet_max_balance')->first()->value;

        $update_route = str_replace('edit', 'update', Request::route()->getName());
        return view('admin.settings.main-config', compact('ride_request_price_percentage', 'driver_wallet_max_balance', 'update_route'));
    }

    public function updateMainConfig(MainConfigRequest $request)
    {
        $this->service->updateMainConfig($request->validated());
        return redirect()->route("admin.settings.main-config.view")->with('success', __('admin.successfully_updated'));
    }
}
