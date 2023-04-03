<?php

namespace App\Http\Controllers;

use App\Models\Articlecategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request)
    {
        $categories = Articlecategory::query()->whereRaw('ab_parent IS NOT NULL')->get();
        return view('category',[
            'categories' => $categories,
        ]);
    }
}
