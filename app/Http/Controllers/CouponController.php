<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Cart;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=Coupon::orderBy('id','DESC')->paginate('10');
        return view('backend.coupon.index')->with('coupons',$coupon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'code'=>'string|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'quantity' => 'required',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=Coupon::create($data);
        if($status){
            request()->session()->flash('success','Thêm mã giảm giá thành công!');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupon::find($id);
        if($coupon){
            return view('backend.coupon.edit')->with('coupon',$coupon);
        }
        else{
            return view('backend.coupon.index')->with('error','Không tìm thấy mã giảm giá');
        }
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
        $coupon=Coupon::find($id);
        $this->validate($request,[
            'code'=>'string|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        
        $status=$coupon->fill($data)->save();
        if($status){
            request()->session()->flash('success','Cập nhật mã giảm giá thành công!');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('coupon.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::find($id);
        if($coupon){
            $status=$coupon->delete();
            if($status){
                request()->session()->flash('success','Mã giảm giá đã được xóa!');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('coupon.index');
        }
        else{
            request()->session()->flash('error','Không tìm thấy mã giảm giá');
            return redirect()->back();
        }
    }

    public function couponStore(Request $request){
       
        $coupon=Coupon::where('code',$request->code)->where('status','active')->where('quantity','>','0')->first();
        // dd($coupon);
        if(!$coupon){
            // request()->session()->flash('error','Invalid coupon code or do not exist, Please try again');
            return redirect()->back()->with('error', 'Mã giảm giá không tồn tại hoặc đã khóa, hết số lượng mã');
        }
        if($coupon){
            $total_price=Cart::where('user_id',auth()->user()->id)->where('order_id',null)->sum('amount');
            // dd($total_price);
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'value'=>$coupon->discount($total_price)
            ]);
            // request()->session()->flash('success','Coupon successfully applied');
            // return redirect()->back();
            return redirect()->back()->with('success', 'Thêm mã giảm giá thành công!');

        }
    }
}
