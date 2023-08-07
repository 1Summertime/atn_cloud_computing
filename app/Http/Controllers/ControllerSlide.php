<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ControllerSlide extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Slide1 = DB::table('slide')->where('name', '=', 'Slide1')->get();
        $Slide2 = DB::table('slide')->where('name', '=', 'Slide2')->get();
        $session = Session::get('email');
        $user = DB::table('users')->where('email', '=', $session)->get();
        return view('slide', compact('Slide1', 'Slide2','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
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
                'image' => 'required|image|mimes:jpg,png,jpeg,avif|max:5000'
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if($request->hasfile('image')){
             
                $Images = $request->file('image');
               
                $path = public_path('slide/image');
                $Image_name = time(). '_' . $Images->getClientOriginalName();
                $Images->move($path, $Image_name);
              
                
            }
            else{
                $image_name = 'no.jpg';
            }
            $newSlide = new slide();
            $newSlide->name = $request->name;
            $newSlide->slide = $Image_name;
            $newSlide->description = $request->description;
            $newSlide->save();

            
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
