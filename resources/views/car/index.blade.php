@extends('layouts.body')
@section('title', 'Datatable Mobil')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url("/cars/create") }}" class="btn btn-primary btn-lg">Create</a>
            @if (session('status'))
                <div class="alert alert-primary" role="alert">
                {{ session('status') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-0">No</th>
                        <th class="col-md-2">Merk</th>
                        <th class="col-md-2">Seri</th>
                        <th class="col-md-2">Silinder</th>
                        <th class="col-md-2">Tipe</th>
                        <th class="col-md-2">Sub Tipe</th>
                        <th class="col-md-2">Tahun</th>
                        <th class="col-md-2">Bahan Bakar</th>
                        <th class="col-md-2">Penggerak</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $data['from']; ?>
                    <tr>
                        @foreach ($data['data'] as $item)
                        <td>{{ $i }}</td>
                        <td>{{ $item['merk'] }}</td>
                        <td>{{ $item['seri'] }}</td>
                        <td>{{ $item['silinder'] }}</td>
                        <td>{{ $item['tipe'] }}</td>
                        <td>{{ $item['sub_tipe'] }}</td>
                        <td>{{ $item['tahun'] }}</td>
                        <td>{{ $item['bahan_bakar'] }}</td>
                        <td>{{ $item['penggerak'] }}</td>
                        <td>
                            <a href="{{ url("/cars/".$item['id']) }}" class="btn btn-success btn-sm">Show</a>
                            <a href="{{ url("/cars/edit/".$item['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url("/cars/".$item['id']) }}" method="post"
                            onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
                            @csrf
                            @method('delete')
                                <button type="submit" name="submit"
                                class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                        <?php $i++; ?>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            @if ($data['links'])
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @foreach ($data['links'] as $item)
                        <li class="page-item {{ $item['active']? 'active':'' }}"><a class="page-link" href="{{ $item['url2'] }}">{!! $item['label'] !!}</a></li>
                    @endforeach
                </ul>
            </nav>
            @endif
            
        </div>
        <!-- AKHIR DATA -->
    </main>
@endsection