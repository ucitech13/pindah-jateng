<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SEMENTARA: dummy. Ganti dengan query sungguhan, mis. 'value' => Inovasi::count().
        // Isi 'value' dengan null bila datanya belum ada: tampil sebagai "—".
        $stats = [
            ['icon' => 'bi-lightbulb',    'label' => 'Inovasi',  'value' => null],
            ['icon' => 'bi-journal-text', 'label' => 'Riset',    'value' => null],
            ['icon' => 'bi-building',     'label' => 'Instansi', 'value' => null],
            ['icon' => 'bi-newspaper',    'label' => 'Berita',   'value' => null],
        ];

        $recent = collect(range(1, 5))->map(fn (int $i) => [
            'nama'     => "Contoh data {$i}",
            'instansi' => 'Nama instansi',
            'status'   => 'Aktif',
        ]);

        return view('backoffice.dashboard.index', compact('stats', 'recent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
