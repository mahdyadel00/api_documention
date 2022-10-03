<?php
namespace App\Repositories\Interfaces;

interface PropertyRepositoryInterface
{

    public function getVendorProductsById($product_id,$vendor_id);
}
