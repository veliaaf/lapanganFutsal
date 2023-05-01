<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpeningHourDetail;
use App\Models\Rent;
use App\Models\RentDetail;
use App\Models\RentPayment;
use App\Models\History;
use App\Models\PaymentMethodDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Mail\NotifyMail;

class PaymentController extends Controller
{
    public function detailPayment($id)
    {
        $rent = Rent::find($id);
        // $details = [
        //     'title' => 'Mail from websitepercobaan.com',
        //     'body' => 'This is for testing email using smtp'
        // ];
        
        // \Mail::to('fahiravelia@gmail.com')->send(new \App\Mail\NotifyMail($details));
        return view('backend.customer.manage_booking.payment', compact('rent'));
    }

    public function pay(Request $request, $id){
        try {
            $rent = Rent::find($id);
            if(Carbon::now() <= Carbon::parse($rent->created_at)->addMinutes(10)){
                if($request->status == 2){
                    $rent->dp = $request->dp;
                }
                
                $dir = public_path().'/images/payment';
                $file = $request->file('payment');
                if($file){
                    $fileName = Time().".".$file->getClientOriginalName();
                    $file->move($dir, $fileName);
                    $rentPayment = new RentPayment;
                    $rentPayment->rent_id = $rent->id;
                    $rentPayment->payment_method_detail_id = $request->payment_method;
                    $rentPayment->payment = $fileName;
                    $rentPayment->save();
                }
                $rent->payment_status = $request->status;
                $rent->save();
                return redirect()->route('customer.booking.index')->with('success', __('toast.create.success.message'));
            }else{
                return redirect()->back('error', 'Batas waktu pembayaran telah berakhir');
            }
            
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back('error', __('toast.create.failed.message'));
        }
    }

    public function booking(Request $request){
        try{
            $rents = Rent::all();
            $details = OpeningHourDetail::whereIn('id', $request->detail_id)->get();
            $rent = new Rent;
            $rent->field_id = $details[0]->field_id;
            $rent->tenant_name = Auth::user()->customer->first_name.' '.Auth::user()->customer->last_name;
            $rent->date = $request->date;
            $rent->total_price = $details->sum('price');
            $rent->token = Carbon::now()->format('dmyHis').''.(string) ($rents->count()+1).''.$request->select_field.''.$details[0]->Field->Venue->id;
            //dd($rent->total_price);
            if($request->status == 2){
            }
            
            $dir = public_path().'/images/payment';
            $rent->dp = $request->dp;
            $file = $request->file('payment');
            if($file){
                $fileName = Time().".".$file->getClientOriginalName();
                $file->move($dir, $fileName);
                $rent->payment = $fileName;
            }
            
            $rent->save();
            foreach($details as $detail)
            {
                $rentDetail = new RentDetail;
                $rentDetail->rent_id = $rent->id;
                $rentDetail->opening_hour_detail_id = $detail->id;
                $rentDetail->save();
            }

            $history = new History;
            $history->customer_id = Auth::user()->customer->id;
            $history->rent_id = $rent->id;
            $history->save();

            return redirect()->route('customer.payment.detailPayment', $rent->id)->with('success', __('toast.create.success.message'));
        } catch (\Exception $e) {
            return redirect()->back('error', __('toast.create.failed.message'));
        }
        
    }

}
