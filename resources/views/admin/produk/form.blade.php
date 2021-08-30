@extends('admin.layout')

@section('content')
    
@php
    $formTitle = !empty($category) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} produk</h2>
                </div>
                <div class="card-body">
                    @include('admin.pages.flash', ['$errors' => $errors])
                    @if (!empty($produk))
                        {!! Form::model($produk, ['url' => ['admin/produk', $produk->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/produk']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('sku', 'SKU') !!}
                            {!! Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'sku']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('harga', 'Harga') !!}
                            {!! Form::text('harga', null, ['class' => 'form-control', 'placeholder' => 'harga']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_ids', 'Kategori') !!}
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'form-control', 'multiple' => true, 'selected' => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '-- Pilih Kategori --']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deskripsi_pendek', 'Deskripsi Pendek') !!}
                            {!! Form::textarea('deskripsi_pendek', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi Pendek']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('deskripsi', 'deskripsi') !!}
                            {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'placeholder' => 'deskripsi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('berat', 'berat') !!}
                            {!! Form::text('berat', null, ['class' => 'form-control', 'placeholder' => 'berat']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ukuran', 'ukuran') !!}
                            {!! Form::text('ukuran', null, ['class' => 'form-control', 'placeholder' => 'ukuran']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('lebar', 'lebar') !!}
                            {!! Form::text('lebar', null, ['class' => 'form-control', 'placeholder' => 'lebar']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tinggi', 'tinggi') !!}
                            {!! Form::text('tinggi', null, ['class' => 'form-control', 'placeholder' => 'tinggi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', $status , null, ['class' => 'form-control', 'placeholder' => '-- Set Status --']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{ url('admin/produk') }}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection