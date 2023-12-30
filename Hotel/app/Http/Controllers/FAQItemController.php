<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq_categories;



class FAQItemController extends Controller
{
    
/*User Panel */
 public function display()
    {
        $categories = Faq_categories::with('faqItems')->get();

        return view('user.faq', compact('categories'));
    }

/*Admin Panel */

}
