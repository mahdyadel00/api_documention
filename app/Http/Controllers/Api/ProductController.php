<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Job;
use App\Models\ProductReport;
use App\Models\ReportStatus;
use App\Models\Status;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPhotos;
use App\Models\DistinguishProduct;
use App\Models\DistinctionStatus;
use App\Models\ErrorLog;
use App\Models\Message;
use App\Models\OrderProduct;
use Auth;
use Image;
use Validator;
use App\Repositories\ProductRepository;

// use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends ApiController
{
    public $productRepo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
        parent::__construct();
    }

    public function all()
    {

        $user_id = (Auth::guard("api")->check()) ? Auth::guard("api")->user()->id : null;
        $products = $this->productRepo->getProducts($user_id);
        return $products;
    }
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"products"},
     *     summary="Get All Products Rest Api Documention",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

    public function index(Request $request)
    {
        if ($request->user_id)
            $products = $this->productRepo->userProducts($request->user_id);
        else
            $products = $this->productRepo->userProducts(Auth::user()->id);

        return $products;
    }

    public function user_products()
    {
        $products = $this->productRepo->userProducts($user_id);
        return $products;
    }

    public function store(Request $request)
    {

        // var_dump($request->all());
        // return $request->all();
        // exit;
        $rules = [
            'ar_title' => 'required|min:3',
            // 'quantity' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'replacement_cost' => 'numeric',
            'status' => 'required|numeric',
            'categories' => 'required|json',
            'delivery_types' => 'json',
            // 'job_id' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048'

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }

            $error_log = new ErrorLog;
            $error_log->type = "add product validation";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $error_msg['0']['0']['0'];
            $error_log->error = json_encode($error);
            $error_log->save();

            return response()->json(['status' => false, 'message' => $error_msg['0']['0']['0']]);
        }

        try {
            $product = new Product;
            if ($request->en_title) {
                $product->en_title = $request->en_title;
            }

            $product->ar_title = $request->ar_title;
            $product->en_description = $request->en_description;
            $product->ar_description = $request->ar_description;
            $product->categories = $request->categories;
            if ($request->job_id) {
                $product->job_id = $request->job_id;
            }
            $product->replacement_cost = $request->replacement_cost;
            $product->quantity = $request->quantity;
            $product->price_per_day = $request->price_per_day;
            $product->price_per_week = $request->price_per_week;
            $product->price_per_month = $request->price_per_month;
            $product->status = $request->status;
            $product->longitude = $request->longitude;
            $product->latitude = $request->latitude;
            $product->dimensions = $request->dimensions;
            $product->user_id = Auth::user()->id;
            $product->is_deleted = 0;
            if ($request->delivery_types) {
                $product->delivery_types = $request->delivery_types;
            }

            if ($request->city_id) {
                $product->city_id = $request->city_id;
            }

            if ($request->quantity == '') {
                $product->quantity = 1;
            }
            // $product->save();




            // if (true) {
            if ($product->save()) {

                if ($request->images) {
                    foreach ($request->images as $kimage => $image) {
                        $extension = $image->extension();

                        $imageName = time() . rand(1000, 9999) . $kimage . '.' . $extension;

                        $ImageUpload = Image::make($image);
                        // $ImageUpload->orientate();
                        // var_dump();
                        // exit;
                        $originalPath = public_path('uploads');
                        $ImageUpload->save($originalPath . "/" . $imageName);

                        // for save thumnail image
                        $thumbnailPath = public_path('thumbs');
                        $ImageUpload->resize(250, 125);
                        $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);

                        $product_photos = new ProductPhotos;
                        $product_photos->image = $imageName;
                        $product_photos->product_id = $product->id;
                        $product_photos->save();
                    }
                }
            }
            // var_dump($request->all());
            // exit;

            $response = [
                'status' => true,
                'product_id' => $product->id,
                'message' => "The Product has been created successfully!"
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {
            $error_log = new ErrorLog;
            $error_log->type = "add product";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $exception->getMessage();
            $error_log->error = $exception;
            $error_log->save();

            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'ar_title' => 'required|min:3',
            'quantity' => 'required|numeric',
            'price_per_day' => 'required',
            'replacement_cost' => 'numeric',
            'status' => 'required|numeric',
            'categories' => 'required|json',
            'delivery_types' => 'json',
            //            'job_id' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:8048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();

            foreach ($error as $er) {
                $error_msg[] = array($er);
            }

            $error_log = new ErrorLog;
            $error_log->type = "edit product validation";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $error_msg['0']['0']['0'];
            $error_log->error = json_encode($error);
            $error_log->save();

            return response()->json(['status' => false, 'message' => $error_msg['0']['0']['0']]);
        }
        try {
            $product = Product::findOrFail($id);
            if ($request->en_title) {
                $product->en_title = $request->en_title;
            }
            $product->ar_title = $request->ar_title;
            $product->en_description = $request->en_description;
            $product->ar_description = $request->ar_description;
            $product->categories = $request->categories;
            if ($request->job_id) {
                $product->job_id = $request->job_id;
            }
            $product->replacement_cost = $request->replacement_cost;
            $product->quantity = $request->quantity;
            $product->price_per_day = $request->price_per_day;
            $product->price_per_week = $request->price_per_week;
            $product->price_per_month = $request->price_per_month;
            $product->status = $request->status;
            $product->longitude = $request->longitude;
            $product->latitude = $request->latitude;
            $product->dimensions = $request->dimensions;
            if ($request->delivery_types) {
                $product->delivery_types = $request->delivery_types;
            }
            if ($request->city_id) {
                $product->city_id = $request->city_id;
            }
            //$product->save();

            if ($product->save()) {
                if ($request->images) {

                    foreach ($request->images as $kimage => $image) {
                        $extension = $image->getClientOriginalExtension();
                        $imageName = time() . rand(1000, 9999) . $kimage . '.' . $extension;
                        $ImageUpload = Image::make($image);
                        $originalPath = public_path('uploads');
                        $ImageUpload->save($originalPath . "/" . $imageName);

                        // for save thumnail image
                        $thumbnailPath = public_path('thumbs');
                        $ImageUpload->resize(250, 125);
                        $ImageUpload = $ImageUpload->save($thumbnailPath . "/" . $imageName);

                        $product_photos = new ProductPhotos;
                        $product_photos->image = $imageName;
                        $product_photos->product_id = $product->id;
                        $product_photos->save();
                    }
                }
            }

            $response = [
                'status' => true,
                'message' => "The Product has been update successfully!"
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {
            $error_log = new ErrorLog;
            $error_log->type = "update product";
            $error_log->input_request = json_encode($request->all());
            $error_log->message = $exception->getMessage();
            $error_log->error = $exception;
            $error_log->save();

            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function delete(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:products,id',
        ]);

        try {
            $product = product::findOrFail($request->id);
            $order_products = OrderProduct::where('product_id', $request->id)->count();
            $distinguish_products = DistinguishProduct::where('product_id', $request->id)->count();
            if ($order_products == 0 && $distinguish_products == 0) {
                ProductPhotos::where('product_id', $request->id)->delete();
                Message::where('product_id', $request->id)->delete();
                $product->destroy($request->id);
            } else {
                $product->is_deleted = 1;
                $product->save();
            }

            $response = [
                'status' => true,
                'message' => "The Product has been Deleted successfully!"
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function delete_photo(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);
        $photo = ProductPhotos::where('image', $request->image)->first();
        if ($photo) {
            $photo->delete();
            $response = [
                'status' => true,
                'message' => "The Photo has been Deleted successfully!"
            ];
            return response()->json($response, 200);
        }

        $response = [
            'status' => false,
            'message' => "this Photo not exists"
        ];
        return response()->json($response, 200);
    }

    public function nearest(Request $request)
    {
        $this->validate($request, [
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'distance' => 'required|numeric',
        ]);

        $user_id = (Auth::guard("api")->check()) ? Auth::guard("api")->user()->id : null;

        return $this->productRepo->nearestProducts($request->latitude, $request->longitude, $request->distance, $user_id);
    }
    
       /**
     * @OA\Post(
     *     path="/api/products/search",
     *     tags={"products search"},
     *     summary="Search Between All Products Rest Api Documention",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="search",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */

    public function search(Request $request)
    {

        //        

        // var_dump($request->all());
        // exit;
        // $error_log = new ErrorLog;
        // $error_log->type = "search product";
        // $error_log->input_request = json_encode($request->all());
        // $error_log->message = "";
        // $error_log->error = "";
        // $error_log->save();

        // $this->validate($request, [
        //     'longitude' => 'numeric',
        //     'latitude' => 'numeric',
        //     'distance' => 'numeric',
        //     // 'job_id' => 'integer',
        // ]);




        $user_id = (Auth::guard("api")->check()) ? Auth::guard("api")->user()->id : null;
        return $this->productRepo->search($request, $user_id);
    }

    public function details($id)
    {
        return $this->productRepo->getProduct($id);
    }

    public function product_status()
    {
        return Status::get();
    }

    public function delivery_types()
    {
        return DeliveryType::get();
    }

    public function jobs()
    {
        return Job::orderBy('id', 'ASC')->get();
    }

    public function change_active_status(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
            'is_active' => 'required|boolean',
        ]);

        $product = Product::find($request->product_id);
        $product->is_active = $request->is_active;
        $product->save();

        $response = [
            'status' => true,
            //     'message' => "The Status changed",
        ];
        return response()->json($response, 200);
    }

    public function report_status()
    {
        return ReportStatus::get();
    }

    public function report(Request $request)
    {
        $this->validate($request, [
            'report_status_id' => 'required|integer|exists:report_status,id',
        ]);

        // return $request->all();

        $report = new ProductReport;
        if ($request->product_id)
            $report->product_id = $request->product_id;
        if ($request->submitted_order_id)
            $report->submitted_order_id = $request->submitted_order_id;
        $report->report_status_id = $request->report_status_id;
        $report->user_id = Auth::user()->id;
        $report->comment = $request->comment;
        $report->save();

        $response = [
            'status' => true,
            'message' => "This product has been reported",
        ];

        // mo2men@report
        if ($request->product_id) {
            $title = 'Product report';
            $content = 'A new product report ';
        }
        if ($request->submitted_order_id) {
            $title = 'Submitted order report';
            $content = 'A new submitted order report ';
        }
        \Mail::send('email.template', ['content' => $content], function ($message)  use ($title) {
            $subject = $title;
            $message->to('mohdmedic1@gmail.com')->subject($subject);
            //  $message->to('momen.elsyd@gmail.com')->subject($subject);
        });
        // endEdit@report
        return response()->json($response, 200);
    }

    public function distinguish_product_action(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|integer|exists:products,id',
            'distinction_status_id' => 'required|integer|exists:distinction_statuses,id',
            'from_date' => 'required',
            'to_date' => 'required',
            'message' => '',
        ]);


        $distinguish_product = new DistinguishProduct;
        $distinguish_product->user_id = auth()->user()->id;
        $distinguish_product->distinction_status_id = $request->distinction_status_id;
        $distinguish_product->product_id = $request->product_id;
        $distinguish_product->from_date = \Carbon\Carbon::parse($request->from_date);
        $distinguish_product->to_date = \Carbon\Carbon::parse($request->to_date);
        $distinguish_product->message = $request->message;
        $distinguish_product->selected = $request->selected;
        $distinguish_product->save();

        $response = [
            'status' => true,
            'message' => "The product has been Distinguish successfully",
        ];
        return response()->json($response, 200);
    }

    public function distinguish_product_list()
    {
        return DistinguishProduct::with(['status', 'product'])->where('user_id', auth()->user()->id)->latest()->get();
    }

    public function distinguish_statuses($id = null)
    {
        if ($id) {
            return DistinctionStatus::find($id);
        } else {
            return DistinctionStatus::get();
        }
    }

     /**
     * @OA\Post(
     *     path="/product/show_hide_product/{product}",
     *     tags={"products activate"},
     *     summary="Activate the product when the user is logged in and if the activation of the product is equal to zero or one All Products Rest Api Documention",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="show_hide_product",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function show_hide_product(Product $product, Request $request)
    {
        // dd($product->user_id,auth()->user()->id);
        if ($product->user_id == auth()->user()->id) {
            $product->is_active = $request->is_active;
            $product->save();

            if ($request->is_active == 1) {
                $status = "Activated";
            } else {
                $status = "disActivated";
            }

            $response = [
                'status' => true,
                'message' => "The product has been " . $status . " successfully",
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