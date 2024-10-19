<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Regency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class SyncLocationController extends Controller
{
    private $client;
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('services.rajaongkir.base_url');
        $this->apiKey = config('services.rajaongkir.api_key');
    }

    public function syncProvinces()
    {
        $response = $this->client->request('GET', $this->baseUrl . 'province', [
            'headers' => [
                'key' => $this->apiKey,
            ]
        ]);

        $provinces = json_decode($response->getBody(), true)['rajaongkir']['results'];

        foreach ($provinces as $province) {
            Province::updateOrCreate(
                ['province_id' => $province['province_id']],
                ['name' => $province['province']]
            );
        }

        return response()->json(['message' => 'Provinces synced successfully']);
    }

    public function syncRegencies()
    {
        $provinces = Province::all();

        foreach ($provinces as $province) {
            $response = $this->client->request('GET', $this->baseUrl . 'city', [
                'headers' => [
                    'key' => $this->apiKey,
                ],
                'query' => [
                    'province' => $province->province_id,
                ]
            ]);

            $regencies = json_decode($response->getBody(), true)['rajaongkir']['results'];

            foreach ($regencies as $regency) {
                Regency::updateOrCreate(
                    ['regency_id' => $regency['city_id']],
                    ['province_id' => $province->province_id, 'name' => $regency['city_name']]
                );
            }
        }

        return response()->json(['message' => 'Regencies synced successfully']);
    }

}
