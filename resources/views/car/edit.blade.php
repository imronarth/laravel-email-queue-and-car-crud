@extends('layouts.body')
@section('title', 'Edit Data Mobil')

@section('content')
    <main class="container">
        <!-- START FORM -->
        <a href="{{ route('car-index') }}" class="btn btn-secondary">Back</a>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form action='{{ url("/cars/".$data['id'] ) }}' method='post'>
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='merk' id="merk" value="{{ old('merk', $data['merk']) }}">
                    </div>
                    @error('merk')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="seri" class="col-sm-2 col-form-label">Seri</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='seri' id="seri" value="{{ old('seri', $data['seri']) }}">
                    </div>
                    @error('seri')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="silinder" class="col-sm-2 col-form-label">Silinder</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='silinder' id="silinder"
                        value="{{ old('silinder', $data['silinder']) }}">
                    </div>
                    @error('silinder')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tipe' id="tipe" value="{{ old('tipe', $data['tipe']) }}">
                    </div>
                    @error('tipe')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="sub_tipe" class="col-sm-2 col-form-label">Sub Tipe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='sub_tipe' id="sub_tipe"
                        value="{{ old('sub_tipe', $data['sub_tipe']) }}">
                    </div>
                    @error('sub_tipe')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="transmisi" class="col-sm-2 col-form-label">Transmisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='transmisi' id="transmisi"
                        value="{{ old('transmisi', $data['transmisi']) }}">
                    </div>
                    @error('transmisi')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="bahan_bakar" class="col-sm-2 col-form-label">Bahan Bakar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='bahan_bakar' id="bahan_bakar" 
                        value="{{ old('bahan_bakar', $data['bahan_bakar']) }}">
                    </div>
                    @error('bahan_bakar')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tahun' id="tahun" value="{{ old('tahun', $data['tahun']) }}">
                    </div>
                    @error('tahun')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label for="penggerak" class="col-sm-2 col-form-label">Penggerak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control w-50" name='penggerak' id="penggerak"
                        value="{{ old('penggerak', $data['penggerak']) }}">
                    </div>
                    @error('penggerak')
                        <label style="color: red">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->
    </main>
@endsection