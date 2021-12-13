<?php

namespace App\Http\Controllers;

use App\Models\VGA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VGAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vga/index', [
            "active" => "vga",
            "data_vga" => VGA::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('vga/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_vga' => 'required|max:255',
            'harga' => 'required|int',
            'memori' => 'required|int',
            'core_clock' => 'required|int',
            'memory_clock' => 'required|int',
            'daya' => 'required|int',
            'gambar' => 'image|file|max:2048'
        ]);

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'img/';
            $namaGambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $validatedData['gambar'] = "$namaGambar";
        }

        VGA::create($validatedData);

        return redirect('/vga')->with('success', 'Data VGA berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VGA  $vGA
     * @return \Illuminate\Http\Response
     */
    public function show(VGA $vGA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VGA  $vGA
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');
        // return $id;
        $vga = VGA::find($id);
        // return $vga;
        return view('vga.edit', [
            'vga' => $vga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VGA  $vGA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VGA $vga)
    {
        $validatedData = $request->validate([
            'nama_vga' => 'required|max:255',
            'harga' => 'required|int',
            'memori' => 'required|int',
            'core_clock' => 'required|int',
            'memory_clock' => 'required|int',
            'daya' => 'required|int',
            'gambar' => 'image|file|max:2048'
        ]);

        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'img/';
            File::delete($destinationPath . $request->gambarLama);
            $namaGambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $namaGambar);
            $validatedData['gambar'] = "$namaGambar";
        } else {
            unset($validatedData['gambar']);
        }

        VGA::where('id', $vga->id)
            ->update($validatedData);

        return redirect('/vga')->with('success', 'Data VGA berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VGA  $vGA
     * @return \Illuminate\Http\Response
     */
    public function destroy(VGA $Vga)
    {
        VGA::destroy($Vga->id);
        return redirect('/vga')->with('success', 'Data VGA berhasil dihapus!');
    }
}
