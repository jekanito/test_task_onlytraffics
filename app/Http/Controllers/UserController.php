<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::select([
            'id',
            'name',
            'telegram_user_login',
            'telegram_user_id',
            'active'
        ])->orderBy('id', 'desc')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function activate(User $user): RedirectResponse
    {
        $user->active = 1;
        $user->save();

        return redirect()->route('users.index')->with('success','Пользователь успешно активирован');
    }
}
