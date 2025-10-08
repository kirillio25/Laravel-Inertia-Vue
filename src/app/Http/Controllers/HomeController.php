<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        })->paginate(5)->withQueryString();

        return Inertia::render('Home', [
            'users' => $users,
            'searchTerm' => $request->search,
            'can' => [
                'delete_user' => Auth::user()
                    ? Auth::user()->can('delete', User::class)
                    : null,
            ],
        ]);
    }
}
