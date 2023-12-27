<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq_categories;


class FAQCategoryController extends Controller
{
public function index()
    {
        $categories = Faq_categories::all();

        return view('admin.categories.index', compact('categories'));
    }

}
