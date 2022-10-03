<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Share;

use Auth;
use Mail;


class ShareController extends ApiController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        return Share::with('product','user')->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
    }

    public function store(Request $request){
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
        ]);
        
        $share_exist = Share::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->first();

        if(!$share_exist){

            $share = new Share;
            $share->product_id = $request->product_id;
            $share->user_id = Auth::user()->id;
            $share->save();

            $response = [
                'status' => true,
                'message' => "The product has been added to Share List successfully!"
            ];
            return response()->json($response, 200);
         }else{
            $response = [
                'status' => false,
                'message' => "This product is already added to the Share list !"
            ];
            return response()->json($response, 200);
        }
   

    }


    public function delete(Request $request){

        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
        ]);
        try {
            $share = Share::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->firstOrFail();
            $share->delete();
            $response = [
                'status' => true,
                'message' => "The Product has been Deleted from Share list successfully!"
            ];
            return response()->json($response, 200);
        }catch (ModelNotFoundException $exception){
            return response()->json(['status' => false,'message' => "The item Not Found"], 500);
        }
    }
    
    public function send_to_frind(Request $request){
        
         $this->validate($request, [
            'email' => 'required|email',
        ]);
         
        $share_list = Share::with('product','user')->where('user_id',Auth::user()->id)->orderBy('id','ASC')->get();
          
        $title = "test";
         Mail::send('email.share_list', ['share_list'=>$share_list], function ($message)  use ($title, $request){
              $subject = $title;
              $message->to($request->email)->subject($subject);
         });
         
         Share::with('product','user')->where('user_id',Auth::user()->id)->delete();
         
         $response = [
                'status' => true,
                'message' => "The Share List has been sent successfully!"
            ];
         return response()->json($response, 200);
    }


}
