<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

use DB;

class ProductRepository implements ProductRepositoryInterface
{


    public function userProducts($user_id)
    {
        $products = Product::latest()->with(['photos', 'city'])->where('user_id', $user_id)->where('is_deleted', 0)
            ->orderBy('id', 'ASC')
            ->paginate(20);

        foreach ($products as $k => $product) {
            $products[$k]->isFavorite = ($product->wishlist()->where('user_id', $user_id)->first()) ? true : false;
        }
        return $products;
    }

    public function nearestProducts($lat, $lng, $distance, $user_id = null)
    {
        $products = Product::getByDistance($lat, $lng, $distance);

        $ids = [];
        foreach ($products as $k => $product) {
            array_push($ids, $product->id);
        }

        $products = Product::latest()->where('is_active', 1)->where('is_deleted', 0)->where('is_blocked', 0)->with('photos')->whereIn('id', $ids)->paginate(20);
        foreach ($products as $k => $product) {
            if ($user_id) {
                $products[$k]->isFavorite = ($product->wishlist()->where('user_id', $user_id)->first()) ? true : false;
            }
        }

        return $products;
    }

    public function getProduct($id)
    {
        $products = Product::with(['photos', 'city'])->where('is_deleted', 0)->where('is_active', 1)->where('is_blocked', 0)->where('id', $id)->first();
        return $products;
    }

    public function getProducts($user_id = null)
    {
        $products = Product::latest()->with(['photos', 'city'])->where('is_deleted', 0)->where('is_active', 1)->where('is_blocked', 0)->orderBy('id', 'ASC')->paginate(10);
        if ($user_id) {
            $products->where('user_id', $user_id);
        }

        foreach ($products as $k => $product) {
            if ($user_id) {
                $products[$k]->isFavorite = ($product->wishlist()->where('user_id', $user_id)->first()) ? true : false;
            }
        }

        return $products;
    }


    public function delete($id)
    {
        Product::destroy($id);
    }




    public function search($request, $user_id = null)
    {
        // DB::enableQueryLog();

        $products = Product::where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->latest()->with(['photos', 'city']);
        $ids = [];
        if ($request->latitude && $request->latitude != "" && $request->longitude && $request->longitude != "") {
            if ($request->distance == "") {
                $request->distance = 60;
            }
            $nearest_products = Product::where('is_active', 1)->where('is_blocked', 0)->getByDistance($request->latitude, $request->longitude, $request->distance);
            $ids = [];
            foreach ($nearest_products as $product) {
                array_push($ids, $product->id);
            }
            $products = $products->whereIn('id', $ids);
        }

        if ($request->search_str) {
            $search_str = trim($request->search_str);
            $products = $products->where('is_active', 1)->where('is_blocked', 0)->where('is_deleted', 0)->where(
                function ($q) use ($search_str) {
                    $q->where('ar_title', 'LIKE', '%' . $search_str . '%');
                    $q->orWhere('en_title', 'LIKE', '%' . $search_str . '%');
                }
            );
        }
        if ($request->city && $request->city != "-1" && $request->city != "0" && $request->city != "") {
            $products = $products->where('city_id', $request->city);
        }

        if ($request->categories && $request->categories != "0" && $request->categories != "") {

            // $array = array_values(array_map('strval',$request->categories));

            // return $request->categories;
            $categories = (is_array($request->categories)) ? $request->categories : json_decode($request->categories);
            // return $categories;
            // return $category;
            // $products = $products->whereJsonContains('categories', $category);
            // $products = $products->where('categories', 'like', '[' . $category . ',%')->orWhere('categories', 'like', '%,' . $category . ']')->orWhere('categories', 'like', '%,' . $category . ',%')->orWhere('categories', 'like', '[' . $category . ']');
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
            // $products = $products->where('categories', 'like', '%' . $category . '%');

            // $products = $products->whereRaw('JSON_CONTAINS(`categories`,"\"'.$category.'\"", "$")');

            // } else {
            //     // $products = $products->orWhereJsonContains('categories', $category);
            //     // $products = $products->orWhere('categories', 'like', '[' . $category . ',%')->orWhere('categories', 'like', '%,' . $category . ']')->orWhere('categories', 'like', '%,' . $category . ',%')->orWhere('categories', 'like', '[' . $category . ']');
            //     // $products = $products->orWhere(
            //     //     function ($q) use ($category) {
            //     //         $q->where('categories', 'like', '[' . $category . ',%');
            //     //         $q->orWhere('categories', 'like', '%,' . $category . ']');
            //     //         $q->orWhere('categories', 'like', '%,' . $category . ',%');
            //     //         $q->orWhere('categories', 'like', '[' . $category . ']');
            //     //     }
            //     // );

            //     $products = $products->orWhere(
            //         function ($qu) use ($category) {
            //             $qu->orWhere(function ($q) use ($category) {
            //                 $q->orWhere('categories', 'like', '[' . $category . ',%');
            //                 $q->orWhere('categories', 'like', '%,' . $category . ']');
            //                 $q->orWhere('categories', 'like', '%,' . $category . ',%');
            //                 $q->orWhere('categories', 'like', '[' . $category . ']');
            //             });
            //         }
            //      );
            //     // $products = $products->orWhere('categories', 'like', '%' . $category . '%');
            //     // $products = $products->orWhereRaw('JSON_CONTAINS(`categories`,"\"'.$category.'\"", "$")');
            // }
            // }
        }

        if ($request->price_from && !empty($request->price_from)) {
            $products = $products->where('price_per_day', '>=', $request->price_from);
        }

        if ($request->price_to && !empty($request->price_to)) {
            $products = $products->where('price_per_day', '<=', $request->price_to);
        }

        if ($request->job_id && !empty($request->job_id)) {
            $jobs = (is_array($request->job_id)) ? $request->job_id : json_decode($request->job_id);
            if (!empty($jobs)) {
                $products = $products->whereIn('job_id', $jobs);
            }
        }

        if ($request->city_id && !empty($request->city_id)) {
            $products = $products->where('city_id', $request->city_id);
        }

        $products = $products->paginate(20);

        foreach ($products as $k => $product) {
            array_push($ids, $product->id);
            if ($user_id) {
                $products[$k]->isFavorite = ($product->wishlist()->where('user_id', $user_id)->first()) ? true : false;
            }
        }
        // $query = DB::getQueryLog();
        // print_r($query);
        return $products;
    }
}
