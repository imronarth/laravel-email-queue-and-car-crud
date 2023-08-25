<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CarController extends Controller
{
    public $client;
    public function __construct()
    {
        $this->client = new Client();
    }
    public function index(Request $request)
    {
        $url_current = url()->current();
        $url = config('urlapi.service1') . "/api/cars";
        if ($request->input('page') != '') {
            $url = $url . '?page=' . $request->input('page');
        };
        $response = $this->client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        foreach ($data['links'] as $key => $value) {
            $data['links'][$key]['url2'] = str_replace(
                config('urlapi.service1') . "/api/cars",
                $url_current,
                $value['url']
            );
        }
        return view("car.index", ['data' => $data]);
    }
    public function create()
    {
        return view("car.create");
    }
    public function store(Request $request)
    {
        try {
            $url = config('urlapi.service1') . "/api/cars";
            $response = $this->client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'merk' => $request->merk,
                    'seri' => $request->seri,
                    'silinder' => $request->silinder,
                    'tipe' => $request->tipe,
                    'sub_tipe' => $request->sub_tipe,
                    'transmisi' => $request->transmisi,
                    'tahun' => $request->tahun,
                    'bahan_bakar' => $request->bahan_bakar,
                    'penggerak' => $request->penggerak,
                ],
            ]);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            return redirect()->route('car-index')->with('status', $contentArray['message']);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $errors = $contentArray['errors'];
            return redirect()->route('car-create')->withErrors($errors)->withInput();
        }
    }
    public function show($id)
    {
        try {
            $url = config('urlapi.service1') . "/api/cars/{$id}";
            $response = $this->client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $data = $contentArray['data'];
            return view("car.card", ['data' => $data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $message = $contentArray['message'];
            return redirect()->route('car-index')->with('failed', $message);
        }
    }
    public function destroy($id)
    {
        $url = "http://127.0.0.1:1000/api/cars/{$id}";
        $response = $this->client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if (!$contentArray['status']) {
            return redirect()->route('car-index')->with('alert', "Data tidak ditemukan");
        }
        return redirect()->route('car-index')->with('status', $contentArray['message']);
    }
    public function edit($id)
    {
        try {
            $url = config('urlapi.service1') . "/api/cars/{$id}";
            $response = $this->client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $data = $contentArray['data'];
            return view("car.edit", ['data' => $data]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $message = $contentArray['message'];
            return redirect()->route('car-index')->with('failed', $message);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $url = config('urlapi.service1') . "/api/cars/{$id}";
            $response = $this->client->patch($url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'merk' => $request->merk,
                    'seri' => $request->seri,
                    'silinder' => $request->silinder,
                    'tipe' => $request->tipe,
                    'sub_tipe' => $request->sub_tipe,
                    'transmisi' => $request->transmisi,
                    'tahun' => $request->tahun,
                    'bahan_bakar' => $request->bahan_bakar,
                    'penggerak' => $request->penggerak,
                ],
            ]);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            return redirect()->route('car-index')->with('status', $contentArray['message']);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $errors = $contentArray['errors'];
            return redirect()->route('car-create')->withErrors($errors)->withInput();
        }
    }
}
