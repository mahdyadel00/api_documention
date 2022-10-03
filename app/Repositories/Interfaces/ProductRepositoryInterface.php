<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function userProducts($user_id);

    public function nearestProducts($lat,$lng,$distance);

    public function delete($id);

    public function getProducts();

    public function getProduct($id);

    public function search($request);


}
