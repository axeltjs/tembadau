<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use App\Model\Produk;
use Form;
use Html;
use Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('produk') == 0){
            $data = Produk::where('produk', 0)->paginate(10);
        }else{
            $data = Produk::where('produk', 1)->paginate(10);
        }
        $view = [
            'items' => $data
        ];
        return view('produk.index')->with($view);
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
        return view('produk.create_edit')->with($view);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $data = Produk::create($request->all());
        if($data){
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
        $data = Produk::findOrFail($id);
        $view = [
            'method' => 'edit',
            'data'   => $data
        ];
        return view('produk.create_edit')->with($view);

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
        $data = Produk::findOrFail($id);
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
        $data = Produk::findOrFail($id)->delete();     
        if ($data) {
            Session::flash("flash_notification", [
                                "level"=>"success",
                                "message"=>"Data berhasil dihapus!"
                            ]);
            return redirect()->back();
        }
   
    }
}
