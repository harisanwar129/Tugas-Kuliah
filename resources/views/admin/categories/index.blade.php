@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Kategori</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/categories/create') }}" class="btn btn-primary mb-3">Tambah Baru</a>
                        @include('admin.pages.flash')
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Kategori Induk</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>    
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent ? $category->parent->name : '' }}</td>
                                        <td>
                                            <a href="{{ url('admin/categories/'. $category->id .'/edit') }}" class="btn btn-warning btn-sm">Ubah</a>
                                            
                                            {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('hapus', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection