
@extends('layouts.body')
@section('title', 'Detail Mobil')    

@section('content')
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ route('car-index') }}" class="btn btn-secondary">Back</a>
            </br>
            </br>
        <div class="card">
            <div class="card-header">
                Detail Mobil
            </div>
            <div class="card-body">
                <h5 class="card-title">Merk = {{ $data['merk'] }}</h5>
                <p class="card-text">Seri = {{ $data['seri'] }}</p>
                <p class="card-text">Silinder = {{ $data['silinder'] }}</p>
                <p class="card-text">Tipe = {{ $data['tipe'] }}</p>
                <p class="card-text">Sub Tipe = {{ $data['sub_tipe'] }}</p>
                <p class="card-text">Transmisi = {{ $data['transmisi'] }}</p>
                <p class="card-text">Tahun = {{ $data['tahun'] }}</p>
                <p class="card-text">Bahan Bakar = {{ $data['bahan_bakar'] }}</p>
                <p class="card-text">Penggerak = {{ $data['penggerak'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection