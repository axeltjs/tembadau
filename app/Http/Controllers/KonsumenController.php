<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KonsumenRequest;
use App\Model\Konsumen;
use Form;
use Html;
use Session;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Konsumen::filter($request)->orderBy('no_konsumen')->paginate(10);
        $view = [
            'items' => $data
        ];
        return view('konsumen.index')->with($view);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = [
            'method' => 'create',
        ];
        return view('konsumen.create_edit')->with($view);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KonsumenRequest $request)
    {
        $data = Konsumen::create($request->all());
        if ($data) {
            Session::flash("flash_notification", [
                            "level"=>"success",
                            "message"=>"Data berhasil ditambahkan!"
                        ]);
            return redirect()->back();
        }
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
        $data = Konsumen::findOrFail($id);
        $view = [
            'method' => 'edit',
            'data'   => $data
        ];
        return view('konsumen.create_edit')->with($view);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KonsumenRequest $request, $id)
    {
        $data = Konsumen::findOrFail($id);
        $data = $data->update($request->all());
        if ($data) {
            Session::flash("flash_notification", [
                                    "level"=>"success",
                                    "message"=>"Data berhasil diupdate!"
                                ]);
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Konsumen::findOrFail($id)->delete();
        if ($data) {
            Session::flash("flash_notification", [
                                "level"=>"success",
                                "message"=>"Data berhasil dihapus!"
                            ]);
            return redirect()->back();
        }

    }
}
