<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vpenempatan;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\PenempatanBarang;


class PenempatanBarangController extends Controller
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
            $penempatanbarang = Vpenempatan::all();
            return Datatables::of($penempatanbarang)
                ->addColumn('action',function($penempatanbarang){
                    return view('datatable._action',[
                        'model'    => $penempatanbarang,
                        'form_url' => route('penempatanbarang.destroy',$penempatanbarang->id),
                        'edit_url' => route('penempatanbarang.edit',$penempatanbarang->id),
                        'confirm_message' => 'Yakin Mau Menghapus '.$penempatanbarang->id . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'jumlahpenempatan','name'=>'jumlahpenempatan','title'=>'Jumlah'])
            ->addColumn(['data' => 'tanggalpenempatanfmt','name'=>'tanggalpenempatanfmt','title'=>'Tanggal'])
            ->addColumn(['data' => 'namatempat' , 'name' => 'namatempat' ,'title' =>'Tempat'])
            ->addColumn(['data' => 'namastaff' , 'name' => 'namastaff' ,'title' =>'Staff'])
            ->addColumn(['data' => 'namabarang' , 'name' => 'namabarang' ,'title' =>'Nama'])
            ->addColumn(['data' => 'kodebarang' , 'name' => 'kodebarang' ,'title' =>'Kode'])
            ->addColumn(['data' => 'namakategori' , 'name' => 'namakategori' ,'title' =>'Kategori'])

            ->addColumn(['data' => 'action' , 'name' => 'action' ,'title' => '','orderable'=>false,'searchable'=>false]);

        return view('penempatanbarang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('penempatanbarang.create');
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
        $barangmasuks =DB::select('SELECT *, id_barangmasuk from vbarangmasuks where id_barang = barangmasuk_id and jumlah-ifnull(total_keluar,0)>0');


        $this->validate($request, [
            'jumlah' => 'required|numeric',
            'tanggal' => 'required',
            'barangmasuk_id' => 'required|exists:barang_masuks,id',
            'tempat_id' => 'required|exists:tempats,id',
            'staff_id' => 'required|exists:staff,id'
            ]);
        $penempatanbarang = PenempatanBarang::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $penempatanbarang->id "
            ]);
        return redirect()->route('penempatanbarang.index');
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
        $penempatanbarang = PenempatanBarang::find($id);
        return view('penempatanbarang.edit')->with(compact('penempatanbarang'));
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
            'tanggal' => 'required',
            'barangmasuk_id' => 'required|exists:barang_masuks,id',
            'tempat_id' => 'required|exists:tempats,id',
            'staff_id' => 'required|exists:staff,id'
            ]);
        $penempatanbarang = PenempatanBarang::find($id);
        $penempatanbarang->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $penempatanbarang->id "
            ]);
        return redirect()->route('penempatanbarang.index');
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
        PenempatanBarang::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Penempatan Barang Berhasil Dihapus"
            ]);
        return redirect()->route('penempatanbarang.index');
    }
}
