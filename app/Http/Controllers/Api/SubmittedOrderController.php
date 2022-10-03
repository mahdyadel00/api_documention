<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\SubmittedOrder;
use Auth;
use Image;
use App\Models\ErrorLog;
use App\Models\Message;
use App\Models\Offer;
use App\Repositories\SubmittedOrderRepository;

class SubmittedOrderController extends ApiController
{
    public $submittedOrderRepo;
    public function __construct(SubmittedOrderRepository $submittedOrderRepo)
    {
        $this->submittedOrderRepo = $submittedOrderRepo;

        parent::__construct();
    }
    public function all()
    {
        $submitted_orders = SubmittedOrder::where('is_blocked', 0)->where('is_active', 1)->where('is_deleted', 0)->with(['user', 'job', 'offers', 'offers.product', 'offers.product.city', 'offers.product.photos', 'city'])->orderBy('id', 'DESC')->paginate(10);
        foreach ($submitted_orders as $key => $submitted_order) {
            $submitted_orders[$key]['submitted_order_categories'] = $submitted_order->getMainCategoriesAttribute();
        };
        return $submitted_orders;
    }

    public function index()
    {
        $orders = SubmittedOrder::with(['user', 'job', 'offers', 'offers.product', 'city'])->where('user_id', auth()->user()->id)->where('is_deleted', 0)->orderBy('id', 'DESC')->paginate(10);
        return $orders;
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'ar_title' => 'required|min:3',
            'ar_description' => 'required|min:3',
            //  'longitude' => 'required',
            //  'latitude' => 'required',
            //   'categories' => 'required|json',
            //  'delivery_types' => 'json',
            'date_from' => 'required',
            'date_to' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048'
        ]);

        //             $error_log = new ErrorLog;
        //             $error_log->type = "add Submitted Order";
        //             $error_log->input_request = json_encode($request->all());
        //             $error_log->message = "add Submitted Order";
        //             $error_log->error = "";
        //             $error_log->save();

        try {
            $submitted_order = new SubmittedOrder;
            $submitted_order->en_title = $request->en_title;
            $submitted_order->ar_title = $request->ar_title;
            $submitted_order->en_description = $request->en_description;
            $submitted_order->ar_description = $request->ar_description;
            $submitted_order->categories = $request->categories;
            $submitted_order->price_from = $request->price_from;
            $submitted_order->price_to = $request->price_to;
            $submitted_order->date_from =  \Carbon\Carbon::parse($request->date_from);
            // $submitted_order->date_from =  $request->date_from;
            // var_dump($submitted_order->date_from);
            $submitted_order->date_to = \Carbon\Carbon::parse($request->date_to);
            // $submitted_order->date_to = $request->date_to;
            // var_dump($submitted_order->date_to);
            if ($request->longitude) {
                $submitted_order->longitude = $request->longitude;
            }
            if ($request->dimensions) {
                $submitted_order->dimensions = $request->dimensions;
            }
            if ($request->latitude) {
                $submitted_order->latitude = $request->latitude;
            }
            if ($request->job_id) {
                $submitted_order->job_id = $request->job_id;
            }
            if ($request->city_id) {
                $submitted_order->city_id = $request->city_id;
            }

            if ($request->delivery_types) {
                $submitted_order->delivery_types = $request->delivery_types;
            }
            $submitted_order->user_id = Auth::user()->id;

            if ($request->images) {

                $img_arr = [];
                $images = $request->images;

                foreach ($images as $image) {

                    // $extension = $image->getClientOriginalExtension();
                    //  if(!$extension || empty($extension)){
                    $extension = $image->extension();
                    // }
                    $imageName = time() . rand(1000, 9999) . '.' . $extension;


                    $ImageUpload = Image::make($image);

                    $originalPath = public_path('uploads');
                    $ImageUpload->save($originalPath . "/" . $imageName);

                    // for save thumnail image
                    $thumbnailPath = public_path('thumbs');
                    $ImageUpload->resize(250, 125);
                    $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);


                    $img_arr[] = $imageName;
                }

                $submitted_order->images = json_encode($img_arr);
            }


            // var_dump($submitted_order->images);
            // exit;

            $submitted_order->save();


            $response = [
                'status' => true,
                'message' => "The Order has been created successfully!"
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {

            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function search(Request $request)
    {

        $submittedOrder = SubmittedOrder::where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->latest()->with(['user', 'job', 'offers', 'offers.product', 'offers.product.city', 'offers.product.photos']);
        // search of categories
        if ($request->categories && $request->categories != "0" && $request->categories != "") {
            $categories = (is_array($request->categories)) ? $request->categories : json_decode($request->categories);
            $submittedOrder = $submittedOrder->where(
                function ($qu) use ($categories) {

                    foreach ($categories as $k => $category) {
                        $category = $category;
                        if ($k == 0) {
                            $qu->where(function ($q) use ($category) {
                                $q->where('categories', 'like', '[' . $category . ',%');
                                $q->orWhere('categories', 'like', '%,' . $category . ']');
                                $q->orWhere('categories', 'like', '%,' . $category . ',%');
                                $q->orWhere('categories', 'like', '[' . $category . ']');
                            });
                        } else {

                            $qu->orWhere(function ($q) use ($category) {
                                $q->where('categories', 'like', '[' . $category . ',%');
                                $q->orWhere('categories', 'like', '%,' . $category . ']');
                                $q->orWhere('categories', 'like', '%,' . $category . ',%');
                                $q->orWhere('categories', 'like', '[' . $category . ']');
                            });
                        }
                    }
                }
            );
        }
        
        return  response()->json($submittedOrder->get(), 200);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'ar_title' => 'required|min:3',
            'ar_description' => 'required|min:3',
            //            'longitude' => 'required',
            //            'latitude' => 'required',
            //            'categories' => 'required|json',
            //            'delivery_types' => 'json',
            'date_from' => 'required',
            'date_to' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048'
        ]);

        try {
            $submitted_order = SubmittedOrder::findOrFail($id);
            $submitted_order->en_title = $request->en_title;
            $submitted_order->ar_title = $request->ar_title;
            $submitted_order->en_description = $request->en_description;
            $submitted_order->ar_description = $request->ar_description;
            $submitted_order->categories = $request->categories;
            $submitted_order->price_from = $request->price_from;
            $submitted_order->price_to = $request->price_to;
            $submitted_order->date_from =  \Carbon\Carbon::parse($request->date_from);
            $submitted_order->date_to = \Carbon\Carbon::parse($request->date_to);
            if ($request->longitude) {
                $submitted_order->longitude = $request->longitude;
            }
            if ($request->latitude) {
                $submitted_order->latitude = $request->latitude;
            }
            if ($request->dimensions) {
                $submitted_order->dimensions = $request->dimensions;
            }
            //  $submitted_order->user_id = Auth::user()->id;
            if ($request->job_id) {
                $submitted_order->job_id = $request->job_id;
            }

            if ($request->city_id) {
                $submitted_order->city_id = $request->city_id;
            }
            if ($request->delivery_types) {
                $submitted_order->delivery_types = $request->delivery_types;
            }

            if ($request->images) {

                $img_arr = [];
                foreach ($request->images as $image) {
                    // $extension = $image->getClientOriginalExtension();
                    //  if(!$extension || empty($extension)){
                    $extension = $image->extension();
                    // }
                    $imageName = time() . rand(1000, 9999) . '.' . $extension;

                    $ImageUpload = Image::make($image);

                    $originalPath = public_path('uploads');
                    $ImageUpload->save($originalPath . "/" . $imageName);

                    // for save thumnail image
                    $thumbnailPath = public_path('thumbs');
                    $ImageUpload->resize(250, 125);
                    $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);


                    $img_arr[] = $imageName;
                }

                $submitted_order->images = json_encode($img_arr);
            }

            $submitted_order->save();
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }

        $response = [
            'status' => true,
            'message' => "The Order has been update successfully!"
        ];
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:submitted_orders,id',
        ]);
        try {
            SubmittedOrder::findOrFail($request->id)->destroy($request->id);
            Message::where('submitted_id', $request->id)->delete();
            $response = [
                'status' => true,
                'message' => "The Order has been Deleted successfully!"
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function details($id)
    {

        $order = SubmittedOrder::where('user_id', Auth::user()->id)->where('id', $id)->firstOrFail();
        return $order;
    }

    public function add_offer(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'submitted_order_id' => 'required|integer|exists:submitted_orders,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $check_exist = Offer::where(['submitted_order_id' => $request->submitted_order_id, 'product_id' => $request->product_id])->count();
        if ($check_exist > 0) {
            return ['status' => false, 'message' => 'this Offer alreay exist before'];
        }


        $offer = new Offer;
        $offer->user_id = auth()->user()->id;
        $offer->submitted_order_id = $request->submitted_order_id;
        $offer->product_id = $request->product_id;
        $offer->save();
        // dd($offer->submitted_order->id);
        $this->submittedOrderRepo->broadcast_notification_offer_submitted_order($offer);

        $response = [
            'status' => true,
            'message' => "The Offer crated successfully!"
        ];
        return response()->json($response, 200);
    }

    public function offers()
    {

        $offers = Offer::with(['user', 'product', 'submitted_order'])->where('user_id', auth()->user()->id)->get();

        return  [
            'status' => true,
            'offers' => $offers
        ];
    }



    public function show_hide_submittedOrder(SubmittedOrder $submitted_order, Request $request)
    {
        // dd($submitted_order->user_id,auth()->user()->id);
        // return auth()->user()->id;
        if ($submitted_order->user_id == auth()->user()->id) {
            $submitted_order->is_active = $request->is_active;
            $submitted_order->save();

            if ($request->is_active == 1) {
                $status = "Activated";
            } else {
                $status = "disActivated";
            }

            $response = [
                'status' => true,
                'message' => "The submitted order has been " . $status . " successfully",
            ];
        } else {
            $response = [
                'status' => false,
                'message' => "Not Autharized",
            ];
        }
        return response()->json($response, 200);
    }
}
