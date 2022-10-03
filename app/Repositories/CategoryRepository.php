<?php
namespace App\Repositories;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all() {
        Category::all();
    }

    public function create(array $data) {
        Category::create($data);
    }

    public function delete($id) {
        Category::destroy($id);
    }

     public function show($id) {
      // Category::get();
    }

    public function getById($id) {
        return Category::findOrFail($id);
    }

    public function update(array $data, $id) {
        $category = Category::find($id);
        return $category->update($data);
    }


     public function getCategoriesByVendor($id) {
         return Category::with('subCategories')->where('vendor_id',$id)->where('parent_id','0')->orderBy('id','ASC')->get();
    }

}
