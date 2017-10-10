<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class StaffController extends Controller
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
            $staff = Staff::select(['id','nama']);
            return Datatables::of($staff)
                ->addColumn('action',function($staff){
                    return view('datatable._action',[
                        'model' => $staff,
                        'form_url' => route('staff.destroy',$staff->id),
                        'edit_url' => route('staff.edit',$staff->id),
                        'confirm_message' => 'Yakin Mau Menghapus ' . $staff->nama . '?'
                    ]);
                })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama' ,'name' => 'nama','title' => 'Nama'])
        ->addColumn(['data' => 'action' ,'name' => 'action','title' => '','orderable'=>false,'searchable'=>false]);
        return view('staff.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('staff.create');
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
        $this->validate($request, ['nama' => 'required|unique:staff']);
        $staff = Staff::create($request->only('nama'));
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan $staff->nama "
            ]);
        return redirect()->route('staff.index');
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
        $staff = Staff::find($id);
        return view('staff.edit')->with(compact('staff'));
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
        $this->validate($request,['nama' => 'required|unique:staff,nama,' . $id]);
        $staff = Staff::find($id);
        $staff->update($request->only('nama'));
        Session::flash("flash_notification",[
            "level"=>"info",
            "message"=>"Berhasil menyimpan $staff->nama"
            ]);

        return redirect()->route('staff.index');
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
        Staff::destroy($id);

        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Staff Berhasil Dihapus"
            ]);
        return redirect()->route('staff.index');
    }
}
