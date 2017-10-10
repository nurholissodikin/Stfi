<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangMasuk;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class BarangMasukController extends Controller
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
            $barangmasuk = BarangMasuk::with(['barang','staff']);
            return Datatables::of($barangmasuk)
                ->addColumn('action',function($barangmasuk){
                    return view('datatable._action',[
                        'model'    => $barangmasuk,
                        'form_url' => route('barangmasuk.destroy',$barangmasuk->id),
                        'edit_url' => route('barangmasuk.edit',$barangmasuk->id),
                        'confirm_message' => 'Yakin Mau Menghapus '.$barangmasuk->merk . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder

            ->addColumn(['data' => 'barang.nama' , 'name' => 'barang.nama' ,'title' => 'Barang'])
            ->addColumn(['data' => 'jumlah','name'=>'jumlah','title'=>'Jumlah'])
            ->addColumn(['data' => 'harga','name'=>'harga','title'=>'Harga'])
            ->addColumn(['data' => 'merk' , 'name' => 'merk' ,'title' => 'Merk'])
            ->addColumn(['data' => 'kondisi','name'=>'kondisi','title'=>'Kondisi'])
            ->addColumn(['data' => 'suppliyer','name'=>'suppliyer','title'=>'Suppliyer'])
            ->addColumn(['data' => 'tanggal','name'=>'tanggal','title'=>'Tanggal'])
            ->addColumn(['data' => 'staff.nama' , 'name' => 'staff.nama' ,'title' => 'Staff'])
            ->addColumn(['data' => 'action' , 'name' => 'action' ,'title' => '','orderable'=>false,'searchable'=>false]);

        return view('barangmasuk.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barangmasuk.create');
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
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'merk' => 'required',
            'kondisi' => 'required',
            'suppliyer' => 'required',
            'tanggal' => 'required',
            'barang_id' => 'required|exists:barangs,id',
            'staff_id' => 'required|exists:staff,id'
            ]);
        $barangmasuk = BarangMasuk::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $barangmasuk->merk "
            ]);
        return redirect()->route('barangmasuk.index');
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
        $barangmasuk = BarangMasuk::find($id);
        return view('barangmasuk.edit')->with(compact('barangmasuk'));
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
        $this->validate($request, [
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'merk' => 'required',
            'kondisi' => 'required',
            'suppliyer' => 'required',
            'tanggal' => 'required',
            'barang_id' => 'required|exists:barangs,id',
            'staff_id' => 'required|exists:staff,id'
            ]);
        $barangmasuk = BarangMasuk::find($id);
        $barangmasuk->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $barangmasuk->merk "
            ]);
        return redirect()->route('barangmasuk.index');
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
        BarangMasuk::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Barang Masuk Berhasil Dihapus"
            ]);
        return redirect()->route('barangmasuk.index');
    }
}
