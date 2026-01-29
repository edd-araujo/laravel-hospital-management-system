<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Dashboard()
    {

        if (!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

        return match ($user->user_type) {
            'admin' => view('admin.dashboard'),
            'regular' => view('dashboard'),
            default => redirect('/')
        };
    }
}
