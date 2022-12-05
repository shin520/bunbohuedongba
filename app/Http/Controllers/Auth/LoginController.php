<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\HistoryLogin;
use Jenssegers\Agent\Agent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    function authenticated(Request $request, $user)
    {

        $id= Auth::user()->id;
        $ip = request()->ip();
        $agent = new Agent();
        $device = $agent->device(); //Macintos
        $platform = $agent->platform(); //OS X
        $browser = $agent->browser(); //Chrome
        $version = $agent->version($browser); //104.0.0.1
        $version_platform = $agent->version($platform);

        $device_info = $device.' '.$platform.' v'.$version_platform;
        $browser_info = $browser.' v'.$version;

        HistoryLogin::create(['id_user'=>$id,'ip'=> $ip,'device'=> $device_info,'browser' => $browser_info]);
        alert()->success("Xin chào",'Đăng nhập thành công vào hệ thống !');
    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        return [
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => '1'
        ];
    }
}
