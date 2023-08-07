<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product_image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ControllerImage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
            if($validator->fails()){
                return Redirect()->back()->withErrors($validator)->withInput();
            }
        if($request->hasfile('image')){
            $image = $request->file('image');
            $Path = public_path('product/image');
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move($Path, $name);
        }
        $path = DB::table('product_image')->select('path')->where('id', '=', $id)->get();
       $Image_path = 'product/image/'.$path;
       if(File::exists($Image_path)){
        File::delete($Image_path);
       }
       
       $newImage  = product_image::find($id);
       $newImage -> path = $name;
       $newImage-> save();
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
}
