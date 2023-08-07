<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Validation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class ControllerUser extends Controller
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
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request ->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'user_name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'birthday' => 'required',
                'address' => 'required',
                'number' => 'required',
                'role' => 'required'
            ]);
            if($validator ->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
        $newUser = new User();
        $newUser->full_name = $request->full_name;
        $newUser->user_name = $request->user_name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->number = $request->number;
        $newUser->birthday = $request->birthday;
        $newUser->role = $request->role;
        $newUser->address = $request->address;
        $newUser->save();
        return Redirect()->route('showLogin');
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
    public function editprofile($id)
    {
        $user = user::find($id);
        return view('user.edit_profile', compact('user'));
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
        if($request ->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5000',
                'birthday' => 'required',
                'address' => 'required',
                'number' => 'required',
             
            ]);
            if($validator ->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else{
            if($request->hasfile('image')){
                $image = $request->file('image');
                $name = time(). '_' . $image->getClientOriginalName();
                $path = public_path('avatar');
                $image ->move($path, $name);
                }
            $newUser = User::find($id);
            $newUser->full_name = $request->fullname;
            $newUser->user_name = $request->username;
            $newUser->email = $request->email;
            $newUser->number = $request->number;
            $newUser->birthday = $request->birthday;
            $newUser->address = $request->address;
            $newUser->avatar = $name;
            $newUser->save();
            return redirect()->route('profile');
            }
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

    public function profile() {
        $Session = Session::all();
        $profile = DB::table('users')->select()->where('email', '=', $Session['email'])->get();
        return view('user.profile', compact('Session', 'profile'));
    }
    public function create_user() {
        return view('user.create_user');
    }

    public function update_account_buyer(Request $request, $id) {
        if($request->isMethod('Post')){
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'number' => 'required',
                'birthday' => 'required',
                'email' => 'required|email',
                'image' => 'required|image|mimes:jpg,png,jpeg|max:5000',
            ]);
            if($validator->fails()){
                return Redirect()->back()->withErrors($validator)->withInput();
            }
            else{
            if($request->hasfile('image')){
                $image = $request->file('image');
                $name = time() .'_'. $image->getClientOriginalName();
                $path = public_path('avatar');
                $image->move($path, $name);
            }
            $updateAccount = User::find($id);
            $updateAccount->user_name = $request->username;
            $updateAccount->email = $request->email;
            $updateAccount->birthday = $request->birthday;
            $updateAccount->avatar = $name;
            $updateAccount->number = $request->number;
            $updateAccount->save();
        }
        }
    }
    public function edit_account($id) {
        $user = User::find($id);
        return view('user.account.edit', compact('user'));
    }
    public function update_account(Request $request, $id) {
        if($request->isMethod('Post')){
            $validator = Validator::make($request->all(), [
                'user_name' => 'required',
                'number' => 'required',
                'birthday' => 'required',
                'email' => 'required|email',
                'role' => 'required'
            ]);
            if($validator->fails()){
                return Redirect()->back()->withErrors($validator)->withInput();
            }
            else{
           
            $updateAccount = User::find($id);
            $updateAccount->user_name = $request->user_name;
            $updateAccount->email = $request->email;
            $updateAccount->birthday = $request->birthday;
            $updateAccount->role = $request->role;
            $updateAccount->number = $request->number;
            $updateAccount->save();
            
        }
        }
    }
}
