<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Telegram;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $user = User::checkUser($data);

        if ($user->active) {
            auth()->login($user);
            $request->session()->regenerate();
            Telegram::sendMessageOnAdminGroup('Пользватель ' . $data['name'] . ' вошёл в систему');
            return redirect()->route('main');
        }

        Telegram::sendMessageOnAdminGroup('Пользватель ' . $data['name'] . ' зарегестрировался и ожидает подтверждение аккаунта');

        return back()->withErrors(['error' => 'Ваш аккаунт зарегестрирован в системе, ожидайте подтвержение админом заявку']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
