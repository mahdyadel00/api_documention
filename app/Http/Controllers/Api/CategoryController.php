<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\ProductRepository;

use Auth;


class CategoryController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(ProductRepository $productRepo)
    {

        $categories = Category::where('parent_id', 0)->orderBy('id', 'ASC')->get();
        // return $categories;
        $cat = $categories[0];
        $categories[0] = new \stdClass;
        $categories[0]->id = 0;
        $categories[0]->en_name = $cat->en_name;
        $categories[0]->ar_name = $cat->ar_name;
        $categories[0]->image = $cat->image;

        // $categories[0] = new \stdClass;
        // $categories[0]->id = 0;
        // $categories[0]->en_name = "All";
        // $categories[0]->ar_name = "الكل";     
        // $categories[0]->image = "";
        // $categories[0]->products = $productRepo->getProducts();


        $this->data['categories'] = $categories;
        return response($this->data);
    }
}
