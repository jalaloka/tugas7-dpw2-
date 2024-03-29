@extends ('template.section.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">

                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/produk/filter') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama" value="{{ $nama ?? "" }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Stok</label>
                                <input type="text" class="form-control" name="stok" value="{{ $stok ?? "" }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Harga max</label>
                                        <input type="text" class="form-control" name="harga_max" value="{{ $harga_max ?? "" }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Harga min</label>
                                        <input type="text" class="form-control" name="harga_min" value="{{ $harga_min ?? "" }}">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-dark float-right"><i class="fa fa-search"></i> Filter</button>
                        </form>
                    </div>
                </div>

                
                <div class="card">
                    <div class="card-header">
                        data produk
                        <a href="{{ url('admin/produk/create') }}" class="btn btn-dark float-right"><i class="fa fa-plus"></i>
                            tambah data</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-datatable">
                            <thead>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </thead>
                            <tbody>
                                @foreach ($list_produk as $produk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/produk', $produk->id) }}" class="btn btn-dark"><i
                                                        class="fa fa-info"></i></a>
                                                <a href="{{ url('admin/produk', $produk->id) }}/edit"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                @include('utils.delete' , ['url' => url('admin/produk', $produk->id) ])
                                            </div>
                                        </td>
                                        <td>{{ $produk->nama }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->stok }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
