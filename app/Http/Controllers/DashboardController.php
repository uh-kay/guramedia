<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        
        $recentBooks = Book::with('category')->latest()->take(5)->get();
        
        return view('dashboard', compact(
            'totalBooks', 
            'totalCategories', 
            'totalUsers',
            'recentBooks'
        ));
    }
}
