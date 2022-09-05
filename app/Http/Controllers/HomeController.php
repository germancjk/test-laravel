<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
