<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Coupon;
use App\Models\CouponUser;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function random_string($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }
    public function coupons()
    {
        $coupons = Coupon::latest()->paginate(15);
        return view('admin.coupons', compact('coupons'));
    }
    public function index()
    {
        return Coupon::all();
    }
    public function edit(Coupon $coupon)
    {

        return view('admin.editcoupon', compact('coupon'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount' => 'required',
            'count' => 'required',
        ]);

        $coupon = $this->random_string(6);


           Coupon::create([
            'coupon' => $coupon,
            'discount' => $request->discount,
            'count' => $request->count,
            'status' => true
        ]);
        return redirect()->back()->with('success', 'Added successfully');
    }
    public function checkcoupon(Request $request){
        $coupon =Coupon::where('coupon',$request->coupon)->first();

        if( !is_null($coupon) && $coupon->status && $coupon->count > 0){
             $user = User::where('email',$request->email)->first();

            if (is_null($user)) return $coupon;
           $checkusers = CouponUser::where('user_id', $user->id)->where('coupon_id',$coupon->id)->first();
            if (is_null($checkusers)) {
                CouponUser::create([
                    'user_id' => $user->id,
                    'coupon_id' => $coupon->id
                ]);
                $coupon->count = $coupon->count - 1;
                $coupon->save();
                return $coupon;
            };
        }
        return response('invalid',400);

    }
    public function adduser($user, $coupon)
    {
        return   $coupon->user()->create([
            'user_id' => $user->id
        ]);
    }
    public function checkusers($user, $coupon)
    {
        return   $coupon->user()->where('user_id', $user->id)->first();
    }
    public function update(Request $request, Coupon $coupon)
    {

        if ($request->has('status') && $request->filled('status')) {
            $coupon->status = $request->status;
        }

        if ($request->has('discount') && $request->filled('discount')) {
            $coupon->discount = $request->discount;
        }

        if ($request->has('count') && $request->filled('count')) {
            $coupon->count = $request->count;
        }
        $coupon->save();
        $coupons = Coupon::latest()->paginate(15);
        return  view('admin.coupons', compact('coupons'))->with('success', 'Updated');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with('success', 'Remove successfully');
    }
}
