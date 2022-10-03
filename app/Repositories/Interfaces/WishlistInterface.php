<?php
namespace App\Repositories\Interfaces;

interface WishlistInterface
{
    public function get($user);

    public function add($user,$product_id);

    public function remove($wishlist_id);
}
