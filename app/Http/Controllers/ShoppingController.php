<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ModelBelanja;
use App\Models\ModelDetil;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarbelanja = ModelBelanja::all();
        $daftarbelanjadetil = ModelDetil::all();
        return view('shoppinglist.index',['daftarbelanja'=>$daftarbelanja,'daftarbelanjadetil'=>$daftarbelanjadetil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('shoppinglist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'judul' => 'required'
        ]);

        $daftar = new ModelBelanja;
        $daftar->tanggal = $request->dateFrom;
        $daftar->judul = $request->judul;
        $daftar->save();

        $daftar_id = $daftar->id;

        $i=0;
        foreach($request->nama as $nama){
            $detail = new ModelDetil;
            $detail->daftarbelanja_id = $daftar_id;
            $detail->nourut = $request->id[$i];
            $detail->namabarang = $request->nama[$i];
            $detail->jml = $request->banyak[$i];
            $detail->satuan = $request->satuan[$i];
            $detail->memo = $request->memo[$i];
            $detail->save();
            $i=$i+1;
        }

        return redirect('/shopping')->with('status', 'Daftar belanja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daftarbelanja = ModelBelanja::all();
        $daftarbelanjadetil = ModelDetil::where('daftarbelanja_id',$id)->get();
        return view('shoppinglist.index',['daftarbelanja'=>$daftarbelanja,'daftarbelanjadetil'=>$daftarbelanjadetil]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelBelanja $daftarbelanja)
    {   
        $daftarbelanjadetil = ModelDetil::where('daftarbelanja_id',$daftarbelanja->id)->get();
        return view('shoppinglist.edit', compact('daftarbelanja','daftarbelanjadetil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelBelanja $daftarbelanja)
    {
        // return $request;
        $daftarbelanja->tanggal = $request->dateFrom;
        $daftarbelanja->judul = $request->judul;
        $daftarbelanja->save();

        $daftar_id = $daftarbelanja->id;

        $i=0;
        // $detail = ModelDetil::find($daftar_id);
        
        foreach($request->nama as $nama){
            $detail = new ModelDetil;
            $detail = ModelDetil::where('daftarbelanja_id',$daftar_id)->where('nourut',$request->id[$i])->update(['namabarang'=>$request->nama[$i],'jml'=>$request->banyak[$i],'satuan'=>$request->satuan[$i],'memo'=>$request->memo[$i]]);
            $i=$i+1;
        }
        return redirect('/shopping')->with('status', 'Daftar belanja berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelBelanja $daftarbelanja)
    {
        ModelBelanja::destroy($daftarbelanja->id);
        ModelDetil::where('daftarbelanja_id',$daftarbelanja->id)->delete();
        return redirect('/shopping')->with('status', 'Daftar belanja berhasil dihapus');
    }
}
