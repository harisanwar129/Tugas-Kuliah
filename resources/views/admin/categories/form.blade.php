@extends('admin.layout')

@section('content')
    
@php
    $formTitle = !empty($category) ? 'Ubah' : 'Baru'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Kategori</h2>
                </div>
                <div class="card-body">
                    @include('admin.pages.flash', ['$errors' => $errors])
                    @if (!empty($category))
                        {!! Form::model($category, ['url' => ['admin/categories', $category->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/categories']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Nama') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Kategori']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Induk Kategori') !!}
                            {!! General::selectMultiLevel('parent_id', $categories, ['class' => 'form-control', 'selected' => !empty(old('parent_id')) ? old('parent_id') : !empty($category['parent_id']) ? $category['parent_id'] : '', 'placeholder' => '-- Pilih Kategori --']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{ url('admin/categories') }}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection