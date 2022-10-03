<?php

namespace  App\Services;

use App\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use \Carbon\Carbon;

class PaymentService
{

    public function checkout($request)
    {

        $request = (!is_object($request)) ? (object) $request : $request;

        $amount = number_format((float)$request->amount, 2, '.', '');
        $production = false;

        $url = ($production) ? "https://oppwa.com/v1/payments" : "https://test.oppwa.com/v1/payments";

        if ($request->payment_brand == 'MADA') {
            $entity_barand_id = "8ac7a4c87495848301749684ee1d040a";
        } else {
            $entity_barand_id = "8ac7a4c874958483017496843ded0405";
        }
        $entity_id = env('ENTITYID') ? env('ENTITYID') : $entity_barand_id;
        $return_payment_route = isset($request->return_payment) ? $request->return_payment : "return_payment";

        $data = "entityId=" . $entity_id .
            "&amount=" . $amount .
            "&currency=SAR" .
            "&paymentType=DB" .
            "&customer.email=" . $request->email .
            "&paymentBrand=" . $request->payment_brand .
            "&card.number=" . $request->card_number .
            "&card.holder=" . $request->holder_name .
            "&card.expiryMonth=" . $request->expiry_month .
            "&card.expiryYear=" . $request->expiry_year .
            "&card.cvv=" . $request->cvv .
            "&shopperResultUrl=" . route($return_payment_route, $request->data);


        $accessToken = ($production) ? '' : 'OGFjN2E0Yzg3NDk1ODQ4MzAxNzQ5NjgzZTJhMzA0MDB8U0NORGQ2YmZlag==';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer ' . $accessToken));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, ($production == true) ? true : false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);


        $responseDecode = json_decode($responseData);
        return $responseDecode;
    }


    public function transaction($request)
    {
        $request = (!is_object($request)) ? (object) $request : $request;


        $entity_id = env('ENTITYID') ? env('ENTITYID') : "8ac7a4c874958483017496843ded0405";

        $url = "https://test.oppwa.com/v1/payments/" . $request->id;
        $url .= "?entityId=" . $entity_id;


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer OGFjN2E0Yzg3NDk1ODQ4MzAxNzQ5NjgzZTJhMzA0MDB8U0NORGQ2YmZlag=='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData);
    }
}
