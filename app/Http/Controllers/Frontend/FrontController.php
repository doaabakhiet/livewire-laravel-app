<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $trendingProducts=Product::where('trending','1')->latest()->take(15)->get();
        $newArrivalProducts=Product::latest()->take(15)->get();
        $featuredProducts=Product::where('featured','1')->latest()->take(15)->get();
        
        return view('frontend.index', compact('sliders','trendingProducts','newArrivalProducts','featuredProducts'));
    }
    public function categories()
    {
        $categories = Category::where('status', '1')->get();
        return view('frontend.collections.categories.index', compact('categories'));
    }
    public function products($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('products','category'));
        } else {
            return redirect()->back();
        }
    }
    public function productView(string $category_slug,string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug',$product_slug)->where('status','1')->first();
            if($product){
                return view('frontend.collections.products.view_product', compact('product','category'));
            }else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function thankYou()
    {
        return view('frontend.collections.thank-you');
    }
    public function newArrival()
    {
        $newArrivalProducts=Product::latest()->take(15)->get();
        return view('frontend.collections.arrivals', compact('newArrivalProducts'));

    }

    public function featured()
    {
        $featuredProducts=Product::where('featured','1')->latest()->take(15)->get();
        return view('frontend.collections.featured', compact('featuredProducts'));

    }
    public function search(Request $request)
    {
        if($request->search){
            $searchProducts=Product::where('name','like','%'.$request->search.'%')->latest()->paginate(10);
            // dd($searchProducts);
            return view('frontend.collections.search',compact('searchProducts'));
        }else{
            return redirect()->back()->with(['message'=>'No Products']);
        }
    }
    public function profile()
    {
        return view('frontend.collections.profile');
    }
    public function updateProfile(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);
        request()->user()->userDetails()->updateOrCreate([
            'user_id'=>Auth::user()->id
        ],[
            'phone'=>$request->phone,
            'address'=>$request->address,
            'pincode'=>$request->pincode
        ]);
        return redirect()->back()->with(['message'=>'Profile Updated Successfully']);
    }
    public function changePassword()
    {
        return view('frontend.collections.change_password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'last_password'=>'required|string',
            'password'=>'required|string|confirmed',
            'password_confirmation'=>'required|string'
        ]);
        User::find(Auth::user()->id)->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->back()->with(['message'=>'Password Changed Successfully']);    
    }
}
