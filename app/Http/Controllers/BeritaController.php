<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * STUB: data masih dummy supaya halaman bisa dilihat tanpa database.
 * Saat model Berita siap, ganti dengan:
 *
 *   index():  $items = Berita::query()->whereNotNull('published_at')->latest('published_at')->paginate(9);
 *   show():   public function show(Berita $berita)   // route: /berita/{berita:slug}
 *             $lainnya = Berita::where('id', '!=', $berita->id)->latest('published_at')->take(4)->get();
 *
 * Lalu hapus dummy(). Blade tidak perlu diubah.
 */

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $all = $this->dummy();
        $perPage = 6;
        $page = LengthAwarePaginator::resolveCurrentPage();

        $items = new LengthAwarePaginator(
            $all->forPage($page, $perPage)->values(),
            $all->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('berita.index', compact('items'));
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
    public function show(string $slug): View
    {
        $all = $this->dummy();
        $berita = $all->firstWhere('slug', $slug);

        abort_if($berita === null, 404);

        $lainnya = $all->where('slug', '!=', $slug)->take(4);

        return view('berita.show', compact('berita', 'lainnya'));
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

    private function dummy(): Collection
    {
        $judul = [
            'Judul berita pertama',
            'Judul berita kedua',
            'Judul berita ketiga',
            'Contoh berita keempat',
            'Contoh berita kelima',
            'Contoh berita keenam',
            'Contoh berita ketujuh',
            'Contoh berita kedelapan',
        ];

        return collect($judul)->map(fn (string $j, int $i) => (object) [
            'judul' => $j,
            'slug' => Str::slug($j),
            'ringkasan' => 'Ringkasan singkat berita. Ganti dengan data dari database.',
            'isi' => "Paragraf pertama isi berita contoh.\n\nParagraf kedua isi berita contoh. Ganti dengan data dari database.",
            'gambar' => null,
            'penulis' => 'Admin BRIDA',
            'published_at' => now()->subWeeks($i),
        ]);
    }
}
