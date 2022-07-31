<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(Request $request) {
        $users_query = User::query();

        $search_param = $request->query('q');

        if ($search_param) {
            $users_query = User::search($search_param);
        }

        $users = $users_query->get();

        return view('index', compact('users', 'search_param'));
    }
}
