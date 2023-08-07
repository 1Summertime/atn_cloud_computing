<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\orders;
use App\Models\slide;
use App\Models\product_image;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\CheckAge;
class ControllerAdmin extends Controller
{
    public function management_user() {
        
        $Buyer = DB::table('users')->select()->where('role', '=', 'buyer')->get();
        $Admin = DB::table('users')->select()->where('role', '=', 'admin')->get();

        return view('user.admin.management_user', compact( 'Buyer', 'Admin'));
    }

    public function management_category() {
        $Category = category::all();

        return view('user.admin.management_category', compact('Category'));
    }
    public function management_product() {
        $Product = product::all();
        $Product_image = product_image::all();
        return view('user.admin.management_product', compact('Product', 'Product_image'));
    }
    public function management_slide() {
        $Slide1 = DB::table('slide')->where('name', '=', 'Slide1')->get();
        $Slide2 = DB::table('slide')->where('name', '=', 'Slide2')->get();
        $Slide3 = DB::table('slide')->where('name', '=', 'Slide3')->get();
        return view('user.admin.management_slide', compact('Slide1', 'Slide2', 'Slide3'));
    }
    public function management_order() {
        $Order = orders::all();

        return view('user.admin.management_order', compact('Order'));
    }
}
