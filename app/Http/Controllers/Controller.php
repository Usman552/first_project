<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\medicines;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $totalproducts = medicines::count();
         $TotalCategories = Category::where('status','1')->count(); 
         $TotalUsers=User::count(); 
        return view('dashboard', compact('totalproducts','TotalCategories','TotalUsers'));
    }
}
