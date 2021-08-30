@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>produk</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/produk/create') }}" class="btn btn-primary mb-3">Tambah</a>
                        @include('admin.pages.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($produk as $product)
                                    <tr>    
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->nama }}</td>
                                        <td>{{ $product->harga }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>
                                            <a href="{{ url('admin/produk/'. $product->id .'/edit') }}" class="btn btn-warning btn-sm">Ubah</a>
                                            
                                            {!! Form::open(['url' => 'admin/produk/'. $product->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center">Tambah Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $produk->links() }}
                    </div>
               
                       
        
                </div>
            </div>
        </div>
    </div>
@endsection