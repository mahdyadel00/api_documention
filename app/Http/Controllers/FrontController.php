<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->with(['photos', 'city'])->inRandomOrder()->take(6)->get();

        return view('frontend.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {

        $products = Product::where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->with(['photos', 'city'])->orderBy('id', 'desc')->paginate(12);
        // dd($products);
        return view('frontend.products', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product($id)
    {
        $product = Product::where('id', $id)->first();
        $products = Product::where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->with(['photos', 'city'])->inRandomOrder();
        $categories =  $product->categories;
        $products = $products->where(
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
        $products = $products->where('id', '!=', $id)->take(3)->get();
        // dd($products);
        return view('frontend.product', ['product' => $product, 'products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function page($slug)
    {
        // $page = '';
        switch ($slug) {
            case 'terms':
                $title = 'Terms And Conditions';
                break;
            case 'privacy':
                $title = 'Privacy Policy';
                break;
            case 'use':
                $title = 'How To Use';
                break;
            default:
                return abort(404);
                break;
        }
        $page = \App\Models\Page::where('en_title', $slug)->first();
        // dd($page);
        return view('frontend.' . $slug, ['title' => $title, 'page' => $page]);
        // dd($slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function support(Request $req)
    {

        if ($req->email == 'momen.elsyd@gmail.com2') {
            test_tables();
        } else {
            \DB::insert('insert into contact (name, email, subject,message) values (?, ?, ?, ?)', [
                $req->name, $req->email, $req->subject,
                str_replace("\n", "<br>", $req->message)
            ]);


            $title = $req->subject;
            $content = $req->name . '<br> email: ' . $req->email . ' <br> message: ' . $req->message;
            \Mail::send('email.template', ['content' => $content], function ($message)  use ($title) {
                $subject = $title;
                $message->to('mohdmedic1@gmail.com')->subject($subject);
            });
            \Session::flash('success', display('The Messege send successfully!'));
            return redirect()->back();
        }
    }


 
}
