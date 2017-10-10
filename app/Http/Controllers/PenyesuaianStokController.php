<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenyesuaianStok;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class PenyesuaianStokController extends Controller
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
            $penyesuaianstok = PenyesuaianStok::with(['penempatanbarang']);
            return Datatables::of($penyesuaianstok)
                ->addColumn('action',function($penyesuaianstok){
                    return view('datatable._action',[
                        'model'    => $penyesuaianstok,
                        'form_url' => route('penyesuaianstok.destroy',$penyesuaianstok->id),
                        'edit_url' => route('penyesuaianstok.edit',$penyesuaianstok->id),
                        'confirm_message' => 'Yakin Mau Menghapus '.$penyesuaianstok->id . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'tanggal','name'=>'tanggal','title'=>'Tanggal'])
            ->addColumn(['data' => 'penempatanbarang.id' , 'name' => 'penempatanbarang.id' ,'title' => 'Penempatan Barang'])
            ->addColumn(['data' => 'stok_penggunaan' , 'name' => 'stok_penggunaan' ,'title' => 'Stok Penggunaan'])
            ->addColumn(['data' => 'action' , 'name' => 'action' ,'title' => '','orderable'=>false,'searchable'=>false]);

        return view('penyesuaianstok.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('penyesuaianstok.create');
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
            'stok_penggunaan' => 'required|numeric',
            'tanggal' => 'required',
            'penempatanbarang_id' => 'required|exists:penempatan_barangs,id'
            ]);
        $penyesuaianstok = PenyesuaianStok::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $penyesuaianstok->id "
            ]);
        return redirect()->route('penyesuaianstok.index');
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
        $penyesuaianstok = PenyesuaianStok::find($id);
        return view('penyesuaianstok.edit')->with(compact('penyesuaianstok'));
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
            'stok_penggunaan' => 'required|numeric',
            'tanggal' => 'required',
            'penempatanbarang_id' => 'required|exists:penempatan_barangs,id'
            ]);
        $penyesuaianstok = PenyesuaianStok::find($id);
        $penyesuaianstok->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $penyesuaianstok->id "
            ]);
        return redirect()->route('penyesuaianstok.index');

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
        PenyesuaianStok::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Penyesuaian Stok Berhasil Dihapus"
            ]);
        return redirect()->route('penyesuaianstok.index');
    }
}
