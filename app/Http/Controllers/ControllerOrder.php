<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_detail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class ControllerOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $session = Session::get('email');
            $user = DB::table('users')->where('email', '=', $session)->get();
            $Order = orders::all();
            
            return view('user.buyer.order', compact('Order', 'user'));
        
    }
    public function delivery_order(Request $request, $id) {
        $delivery_order = orders::find($id);
        $delivery_order->status_delivery = $request->status;
        $delivery_order->save();
        return Redirect()->back();
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
        date_default_timezone_set("Asia/Ho_Chi_Minh");
            $current_time = date("Y-m-d H:i:s");
            $status = "Awaiting confirmation";
        if($request->isMethod('Post')){
            $validator =  Validator::make($request->all(), [
                'full_name' => 'required',
                'address' => 'required',
                'note' => 'required',
                'number' => 'required'
            ]);
            if($validator->fails()){
                return Redirect()->backs()->withErrors($validator)->withInput();
            }
            
            else{
                $newOrder = new orders();
                $newOrder -> name = $request->full_name;
                $newOrder->address = $request->address;
                $newOrder->note = $request->note;
                $newOrder->number = $request->number;
                $newOrder->status_delivery  = $status;
                $newOrder->date = $current_time;
                $newOrder->user_id = 1;
                $newOrder->save(); 
                $updateOrder_detail = order_detail::find($request->order_detail);
                $updateOrder_detail -> orders_id = $newOrder->id;
                $updateOrder_detail->save();
                return route('index.order');
            }
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
        //
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
