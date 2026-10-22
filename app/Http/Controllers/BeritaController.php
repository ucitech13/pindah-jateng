<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $items = Berita::query()->latest('created_at')->paginate(9);

        return view('berita.index', compact('items'));
    }

    public function adminIndex(): View
    {
        $berita = Berita::query()->latest('created_at')->paginate(10);

        return view('backoffice.berita.index', compact('berita'));
    }

    public function adminShow(string $id): View
    {
        $berita = Berita::query()->findOrFail($id);

        return view('backoffice.berita.show', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:10000'],
            'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        $validated['slug'] = $this->uniqueSlug($validated['judul']);
        $validated['created_by'] = $request->user()->getKey();
        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        $berita = Berita::query()->where('slug', $slug)->firstOrFail();
        $lainnya = Berita::query()->whereKeyNot($berita->getKey())->latest('created_at')->take(4)->get();

        return view('berita.show', compact('berita', 'lainnya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::query()->findOrFail($id);

        return view('backoffice.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $berita = Berita::query()->findOrFail($id);
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:10000'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $validated['slug'] = $this->uniqueSlug($validated['judul'], $berita->getKey());
        if ($request->hasFile('gambar')) {
            $newImage = $request->file('gambar')->store('berita', 'public');
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $newImage;
        }
        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Berita::query()->findOrFail($id)->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    private function uniqueSlug(string $judul, ?int $exceptId = null): string
    {
        $base = Str::slug($judul) ?: 'berita';
        $slug = $base;
        $suffix = 2;

        while (Berita::withTrashed()->where('slug', $slug)
            ->when($exceptId, fn ($query) => $query->where('id', '!=', $exceptId))
            ->exists()) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }
}
