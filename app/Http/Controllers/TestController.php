<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Order;
use App\Models\Keranjang;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{

    public function cekOngkir(Request $request)
    {
        $origin = 5;
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = $request->input('courier');

        $response = $this->rajaOngkirRequest('cost', [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
        ]);

        $ongkirResults = $response['rajaongkir']['results'][0]['costs'];

        return view('hasil_ongkir', compact('ongkirResults'));
    }

    protected function rajaOngkirRequest($endpoint, $data)
    {
        $apiKey = 'aca75271d45a42757fb47477a60c5087';
        $url = "https://api.rajaongkir.com/starter/$endpoint";

        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'key' => $apiKey,
            ],
            'form_params' => $data,
        ]);

        return json_decode($response->getBody(), true);
    }
}
