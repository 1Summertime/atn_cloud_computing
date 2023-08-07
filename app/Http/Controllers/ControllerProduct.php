<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\feedback;
use App\Models\product_image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ControllerProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = category::all();
        return view('product.create', compact('Category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'quanity' => 'required',
                'brand' => 'required',
                'color' => 'required',
                'category' => 'required',
                'gender' => 'required',
            
                'price' =>'required',
                'image.*' => 'required|image|mimes:jpg,png,jpeg,avif|max:5000'
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if($request->hasfile('image')){
                $Product_images = [];
                $Images = $request->file('image');
                foreach ($Images as $image) {
                $path = public_path('product/image');
                $Image_name = time(). '_' . $image->getClientOriginalName();
                $image->move($path, $Image_name);
                $Product_images[] = $Image_name;
                }
            }
            else{
                $image_name = 'no.jpg';
            }
            $newProduct = new product();
            $newProduct->name = $request->name;
            $newProduct->quanity = $request->quanity;
            $newProduct->brand = $request->brand;
            $newProduct->color = $request->color;
            $newProduct->category_id = $request->category;
            $newProduct->gender = $request->gender;
            $newProduct->description = $request->description;
            $newProduct->price = $request->price;
        
            $newProduct->save();

            $lastInsertedID = $newProduct->id;
            foreach($Product_images as $product_image){
            $newProduct_image = new product_image();
            $newProduct_image->path = $product_image;
            $newProduct_image->product_id = $lastInsertedID; 
            $newProduct_image->save();
            }
            return Redirect()->route('management_product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        $Category = category::all();
        $session = Session::get('email');
        $user = DB::table('users')->where('email', '=', $session)->get();
        $Feedback = feedback::find($id);
        return view('user.buyer.detail', compact('product', 'Category', 'user', 'Feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        $Category = category::all();
        return view('product.edit', compact('product', 'Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'quanity' => 'required',
                'brand' => 'required',
                'color' => 'required',
                'category' => 'required',
                'gender' => 'required',
                'description' => 'required',
              
            ]); 
            if($validator->fails()){
                return Redirect()->back()->withErrors($validator)->withInput();
            }
       
            $newProduct = product::find($id);
            $newProduct->name = $request->name;
            $newProduct->quanity = $request->quanity;
            $newProduct->brand = $request->brand;
            $newProduct->color = $request->color;
            $newProduct->category_id = $request->category;
            $newProduct->gender = $request->gender;
            $newProduct->description = $request->description;
            
            $newProduct->save();
            return Redirect()->route('management_product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function feedback(Request $request) {
        $session = Session::get('email');
        $user = DB::table('users')->where('email', '=', $session)->get();
        $newFeedback = new feedback();
        $newFeedback->comment = $request->comment;
        $newFeedback->product_id = $request->product_id;
        $newFeedback->user_id = $user[0]->id;
        $newFeedback->save();
        return Redirect()->back();
    }

    public function search_category($id) {
        $Product = product::where('category_id',$id)->get();
        $session = Session::get('email');
        $user = DB::table('users')->where('email', '=', $session)->get();
        $Category_ao = DB::table('category')->where('category', '=', 'ao')->get();
        $Category_quan = DB::table('category')->where('category', '=', 'quan')->get();
        $Category_nha = DB::table('category')->where('category', '=', 'do mac nha')->get();
        $Category_ngoai = DB::table('category')->where('category', '=', 'do mac ngoai')->get();
        return view ('user.buyer.search-category', compact('Product','Category_ao', 'Category_quan','Category_nha', 'Category_ngoai', 'user'));
    }
}
