<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KategoriController extends Controller
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
            $kategori = Kategori::select(['id','nama']);
            return Datatables::of($kategori)
                ->addColumn('action',function($kategori){
                    return view('datatable._action',[
                        'model' => $kategori,
                        'form_url' => route('kategori.destroy',$kategori->id),
                        'edit_url' => route('kategori.edit',$kategori->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $kategori->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'Nama'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('kategori.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kategori.create');
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
        $this->validate($request, ['nama' => 'required|unique:kategoris']);
        $kategori = Kategori::create($request->only('nama'));
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $kategori->nama "
            ]);
        return redirect()->route('kategori.index');
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
        $kategori = Kategori::find($id);
        return view('kategori.edit')->with(compact('kategori'));
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
        $this->validate($request,['nama' => 'required|unique:kategoris,nama,' . $id]);
        $kategori = Kategori::find($id);
        $kategori->update($request->only('nama'));
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil menyimpan $kategori->nama"
            ]);

        return redirect()->route('kategori.index');
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
        Kategori::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Kategori Berhasil Dihapus"
            ]);
        return redirect()->route('kategori.index');
    }
}
