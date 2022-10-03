<?php
namespace App\Repositories\Interfaces;

interface CartRepositoryInterface
{
    public function getCart($user);

    public function addToCart($user,$product_id,$quantity);

    public function updateQunatity($cart_id,$quantity);

    public function deleteItem($cart_id);
}
