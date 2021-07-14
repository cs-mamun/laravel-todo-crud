<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;


    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showResetForm(Request $request, $token = null){
        return view('auth.passwords.reset',[
            'title' => 'Reset Admin Password',
            'passwordUpdateRoute' => 'admin.password.update',
            'token' => $token,
        ]);
    }

    protected function broker(){
        return Password::broker('admins');
    }

    protected function guard(){
        return Auth::guard('admin');
    }
}
