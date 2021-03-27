<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    //
    public function username()
    {
        return 'email'; // this string is column of accounts table which we are going use for login
    }
    //

    //
        // public function login(Request $request)
        // {
        //     $this->validate($request, [
        //         'name' => 'required|string',
        //         'password' => 'required|string|min:8'
        //     ]);
        //     //LAKUKAN PENGECEKAN, JIKA INPUTAN DARI USERNAME FORMATNYA ADALAH EMAIL, MAKA KITA AKAN MELAKUKAN PROSES AUTHENTICATION MENGGUNAKAN EMAIL, SELAIN ITU, AKAN MENGGUNAKAN USERNAME
        //     $loginType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
            
        //     //TAMPUNG INFORMASI LOGINNYA, DIMANA KOLOM TYPE PERTAMA BERSIFAT DINAMIS BERDASARKAN VALUE DARI PENGECEKAN DIATAS
        //     $login = [
        //         $loginType => $request->name,
        //         'password' => $request->password
        //     ];

        //     if (auth()->attempt($login))
        //     {
        //         return redirect()->route('/');
        //     }
        //     return redirect()->route('login')->with(['error' => 'Email/Password salah!']);
        // }
    //

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
