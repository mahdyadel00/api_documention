<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReport;
use App\Models\DistinguishProduct;
use Image;
use Auth;
use Session;
use DB;

use Validator;
use App\Models\Category;
use App\USER;
use App\Models\Message;
use App\Models\Job;
use App\Models\ProductPhotos;
use App\Models\ErrorLog;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
// @mido
use App\Models\DeliveryType;
use App\Models\Status;
use App\Models\Reviews;
// endEdit
class ProductController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->data['title'] = "products";
        $products = Product::latest();
        if ($request->is_blocked && $request->is_blocked != "") {
            $products = $products->where('is_blocked', $request->is_blocked - 1);
        }

        // $this->data['products'] = $products->paginate(15);
   // mo2men@dataTable
   $this->data['products'] = $products->get();
   // endEdit@dataTable
        foreach ($this->data['products'] as $key => $product) {
            $count_star = Reviews::where('product_id', $product->id)->count('id');
            $sum_star = Reviews::where('product_id', $product->id)->sum('star_product');
            if ($count_star)
                $prossecstar = $sum_star / $count_star;
            else
                $prossecstar = 0;

            $this->data['products'][$key]->stars =  round($prossecstar);
        }
        // return $this->data['products'][0];
        // var_dump($this->data['products'][0]->stars);
        // exit;

        return view('admin.product.index', $this->data);
    }

    public function change_block_status(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|integer|exists:products,id',
            'is_blocked' => 'required|boolean',
        ]);

        $product = Product::find($request->id);
        $product->is_blocked = $request->is_blocked;
        $product->save();


        Session::flash('success', 'The Block status has been changed successfully!');
        $response = [
            'status' => true,
            //     'message' => "The Status changed",
        ];
        return response()->json($response);
    }

    public function report_products(Request $request)
    {
        if($request->type == 'submitted'){
            $this->data['title'] = "Submitted Reports";
            $this->data['reports'] = ProductReport::whereNotNull('submitted_order_id')->latest()->paginate(15);
            ProductReport::where('seen',0)->whereNotNull('submitted_order_id')->update(['seen' => 1]);

        }else{
            $this->data['title'] = "products Reports";
            $this->data['reports'] = ProductReport::whereNotNull('product_id')->latest()->paginate(15);
            ProductReport::where('seen',0)->whereNotNull('product_id')->update(['seen' => 1]);
        }
        // mo2men@report
        // endEdit@report
        return view('admin.product.reports', $this->data);
    }

    public function distinguish_products()
    {
        $this->data['title'] = "Distinguish Products";
        $this->data['distinguish_products'] = DistinguishProduct::with(['status', 'product'])->latest()->paginate(15);
        // return $this->data['distinguish_products'];
        return view('admin.product.distinguish_products', $this->data);
    }


    // mide
    // Mido Function Add Product

    public function add(Request $request)
    {
        $this->data['title'] = "products";
        $this->data['users'] = USER::all();
        $this->data['jobs'] = Job::all();

        $this->data['categories'] = Category::all();


        $this->data['status'] = Status::all();
        $this->data['delivery_types'] = DeliveryType::all();

        return view('admin.product.add', $this->data);
    }



    // Mido Function Add Product

    public function add_products(Request $request)
    {

        $rules = [
            'ar_title' => 'required|min:3',
            'en_description' => 'required|string',
            'quantity' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'replacement_cost' => 'numeric',
            'status' => 'required|numeric',
            'categories' => 'required|array',
            'delivery_types' => 'json',
            // 'job_id' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048'

        ];



        $validator = Validator::make($request->all(), $rules);


        // var_dump($request->all());
        // exit;

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

        $product = new Product;

        if ($request->ar_title) {
            $product->en_title = $request->ar_title;
        }

        $product->ar_title = $request->ar_title;
        $product->en_description = $request->en_description;
        $product->ar_description = $request->en_description;

        //////////////////////////////////////////////
        $product->categories = json_encode($_POST['categories']);

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
        $product->user_id = $request->user_id;
        // $product->user_id = Auth::user()->id;
        $product->is_deleted = 0;
        if ($request->delivery_types) {
            $product->delivery_types = $request->delivery_types;
        }

        if ($request->city_id) {
            $product->city_id = $request->city_id;
        }
        // $product->save();

        if ($product->save()) {
            if ($request->images) {
                foreach ($request->images as $kimage => $image) {
                    $extension = $image->extension();


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




        // var_dump($request->all());
        // exit;
        return redirect('/admin/products?page=1');
    }


    // Mido Function Add Product

    // MIdo ADD Function Caht prodect
    public function product_chat(Request $req)
    {
        $this->data['product'] = Product::where('id', $req->product_id)->first();
        $this->data['title'] = "Product #" . $req->product_id . " , owner: " . $this->data['product']->user->name;
        $this->data['messages'] = Message::where('product_id', $req->product_id)
            ->whereIn('user_id', [$req->user_id, $req->to])
            ->whereIn('to', [$req->user_id, $req->to])
            ->with('user')->latest()->get();

        // var_dump(count($this->data['messages']));
        // exit;
        // return view('admin.orders.chat_logs',$this->data);

        return view('admin.product.chat', $this->data);
    }

    public function chat_all_product(Request $req)
    {
        $this->data['product'] = $product = Product::where('id', $req->product_id)->first();
        $this->data['title'] = "Product #" . $req->product_id . " , owner: " . $this->data['product']->user->name;

        $user_id = $product->user->id;
        $this->data['messages'] = $tos = DB::select("select user_id,  users.name from messages 
        left join users on users.id = messages.user_id
        where user_id <> $user_id
        and product_id = $req->product_id
        and `to` = $user_id group by user_id, users.name");

        foreach ($tos as $kt => $vt) {
            $to = $vt->user_id;
            $messages = DB::select("select count(*) as total from messages where user_id in ($user_id, $to)
             and `to` in ($user_id, $to) and product_id = $req->product_id    
             ");
            $vt->total = $messages[0]->total;
        }

        // var_dump($messages);
        // exit;

        return view('admin.product.table_chat', $this->data);
    }
    // endEdit
}
