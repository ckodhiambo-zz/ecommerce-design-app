<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'trending_category'));
    }

    public function category()
    {
        $catgeory = Category::where('status', '0')->get();
        return view('frontend.category', compact('catgeory'));
    }

    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
//            return ($products);
            return view('frontend.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', "Slug does not exist!");
        }
    }

    public function productView($category_slug, $product_slug)
    {
        if (Category::where('slug', $category_slug)->exists()) {
            if (Product::where('slug', 'product_slug')->exists()) {
                $products = Product::where('slug', 'product_slug')->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', "The link was broken");
            }

        } else {
            return redirect('/')->with('status', "No such category exists!");
        }

    }
}
