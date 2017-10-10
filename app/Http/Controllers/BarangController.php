<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $barang = Barang::with(['kategori']);
            return Datatables::of($barang)
                ->addColumn('action',function($barang){
                    return view('datatable._action',[
                        'model'    => $barang,
                        'form_url' => route('barang.destroy',$barang->id),
                        'edit_url' => route('barang.edit',$barang->id),
                        'confirm_message' => 'Yakin Mau Menghapus '.$barang->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data'=>'nama','name'=>'nama','title'=>'Nama'])
            ->addColumn(['data' => 'kode' , 'name' => 'kode' ,'title' => 'Kode'])
            ->addColumn(['data' => 'kategori.nama' , 'name' => 'kategori.nama' ,'title' => 'Kategori'])
            ->addColumn(['data' => 'action' , 'name' => 'action' ,'title' => '','orderable'=>false,'searchable'=>false]);

        return view('barang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama' => 'required|unique:barangs',
            'kode' => 'required|unique:barangs',
            'kategori_id' => 'required|exists:kategoris,id'
            ]);
        $barang = Barang::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $barang->nama "
            ]);
        return redirect()->route('barang.index');
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
        //
        $barang = Barang::find($id);
        return view('barang.edit')->with(compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nama' => 'required|unique:barangs,nama,' . $id,
            'kode' => 'required|unique:barangs,kode,' . $id,
            'kategori_id' => 'required|exists:kategoris,id'
            ]);
        $barang = Barang::find($id);
        $barang->update($request->all());
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil menyimpan $barang->nama"
            ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Barang::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Barang Berhasil Dihapus"
            ]);
        return redirect()->route('barang.index');
    }
}
