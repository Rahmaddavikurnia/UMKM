<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{

        private $client;
        private $apiKey;
    
        public function __construct()
        {
            $this->client = new Client();
            $this->apiKey = env('RAJAONGKIR_API_KEY');
        }
    
        // Mendapatkan daftar provinsi
        public function getProvinces()
        {
            $response = $this->client->request('GET', 'https://api.rajaongkir.com/starter/province', [
                'headers' => [
                    'key' => $this->apiKey
                ]
            ]);
    
            $data = json_decode($response->getBody(), true);
    
            return response()->json($data['rajaongkir']['results'],200);
        }
    
        // Mendapatkan daftar kabupaten/kota berdasarkan ID provinsi
        public function getRegencies($province_id)
        {
            $response = $this->client->request('GET', 'https://api.rajaongkir.com/starter/city', [
                'headers' => [
                    'key' => $this->apiKey
                ],
                'query' => [
                    'province' => $province_id
                ]
            ]);
    
            $data = json_decode($response->getBody(), true);
    
            return response()->json($data['rajaongkir']['results'],200);
        }
}
