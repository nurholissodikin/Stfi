<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tempat;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class TempatController extends Controller
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
            $tempat = Tempat::select(['id','nama','kode']);
            return Datatables::of($tempat)
                ->addColumn('action',function($tempat){
                    return view('datatable._action',[
                        'model' => $tempat,
                        'form_url' => route('tempat.destroy',$tempat->id),
                        'edit_url' => route('tempat.edit',$tempat->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $tempat->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'Nama'])
        ->addColumn(['data' => 'kode' ,'name' => 'kode','title' => 'Kode'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('tempat.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tempat.create');
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
            'nama' => 'required|unique:tempats',
            'kode' => 'required|unique:tempats'
            ]);
        $tempat = Tempat::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $tempat->nama "
            ]);
        return redirect()->route('tempat.index');
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
        $tempat = Tempat::find($id);
        return view('tempat.edit')->with(compact('tempat'));
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
            'nama' => 'required|unique:tempats,nama,' . $id,
            'kode' => 'required|unique:tempats,kode,' . $id
            ]);
        $tempat = Tempat::find($id);
        $tempat->update($request->all());
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil menyimpan $tempat->nama"
            ]);

        return redirect()->route('tempat.index');
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
        Tempat::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Tempat Berhasil Dihapus"
            ]);
        return redirect()->route('tempat.index');
    }
}
