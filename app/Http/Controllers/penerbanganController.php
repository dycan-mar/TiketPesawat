<?php

namespace App\Http\Controllers;

use App\Models\penerbangan;
use App\Models\tiket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class penerbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $response = Http::get('https://portaldata.kemenhub.go.id/api/sigita/airport_pt_all?&format=json');
        $data = [
            'title' => 'Penerbangan',
            'penerbangan' => penerbangan::latest()->paginate(10),
            // 'kota' => $response->json()
        ];
        return view('penerbangan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'namaMaskapai' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggalBerangkat' => 'required',
            'waktuBerangkat' => 'required',
            'harga' => 'required|numeric',
            'kapasitas' => 'required'
        ]);
        if (penerbangan::create(attributes: $validasi)) {
            $id = penerbangan::latest()->get('id');
            for ($i = 1; $i <= $request->kapasitas; $i++) {
                tiket::create([
                    'no' => $i,
                    'idPenerbangan' => penerbangan::latest()->first()->id,
                    'status' => 'tersedia'
                ]);
            }
            return redirect()->route('penerbangan.index')->with('success', 'Penerbangan berhasil ditambahkan');
        } else {
            return redirect()->route('penerbangan.index')->with('error', 'Penerbangan gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'penerbangan' => penerbangan::find($id)
        ];
        return view('penerbangan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'namaMaskapai' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggalBerangkat' => 'required',
            'waktuBerangkat' => 'required',
            'harga' => 'required|numeric',
        ]);
        $record = penerbangan::findOrFail($id);
        if ($record->update($validasi)) {
            return redirect()->route('penerbangan.index')->with('success', 'Penerbangan berhasil diupdate');
        } else {
            return redirect()->route('penerbangan.index')->with('error', 'Penerbangan gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = penerbangan::findOrFail($id);
        if ($record->delete()) {
            return redirect()->route('penerbangan.index')->with('success', 'Penerbangan berhasil dihapus');
        } else {
            return redirect()->route('penerbangan.index')->with('error', 'Penerbangan gagal dihapus');
        }
    }
}
