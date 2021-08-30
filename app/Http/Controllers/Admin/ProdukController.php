<?php

namespace App\Http\Controllers\Admin;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use Str;
use Auth;
use DB;
use Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->data['status']=Produk::status();
     }
    public function index()
    {
        $this->data['produk']=Produk::orderBy('nama','ASC')->paginate(10);
        return view('admin.produk.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','ASC')->get();
        $this->data['categories']=$categories->toArray();
        $this->data['produk']=null;
        $this->data['categoryIDs']=[];

        return view('admin.produk.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $lempar=$request->except('_token');
        $lempar['slug']=Str::slug($lempar['nama']);
        $lempar['user_id']=Auth::user()->id;

        $simpan=false;
        $simpan=DB::transaction(function () use ($lempar) {
            $produk=Produk::create($lempar);
            $produk->kategori()->sync($lempar['category_ids']);

            return true;
        });

        if($simpan){
            Session::flash('success','Data Berhasil Disimpan');
        }
        else{
            Session::flash('success','Data Gagal Disimpan');
        }

        return redirect('admin/produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk=Produk::findOrFail($id);
        $categories=Category::orderBy('name','ASC')->get();

        $this->data['categories']=$categories->toArray();
        $this->data['produk']=$produk;
        $this->data['categoryIDs']=$produk->kategori->pluck('id')->toArray();

        return view('admin.produk.form',$this->data);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, $id)
    {
        
        $lempar=$request->except('_token');
        $lempar['slug']=Str::slug($lempar['nama']);
        
        $produk=Produk::findOrFail($id);

        $simpan=false;
        $simpan=DB::transaction(function () use ($produk,$lempar) {
            $produk->update($lempar);
            $produk->kategori()->sync($lempar['category_ids']);

            return true;
        });

        if($simpan){
            Session::flash('success','Data Berhasil Ubah');
        }
        else{
            Session::flash('success','Data Gagal Di Ubah');
        }

        return redirect('admin/produk');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk  = Produk::findOrFail($id);

        if ($produk->delete()) {
            Session::flash('success', 'Data Berhasil Dihapus');
        }

        return redirect('admin/produk');
    }
}
