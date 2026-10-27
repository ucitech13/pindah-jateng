<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class HeroController extends Controller
{
    public function index(): View
    {
        $heroes = Hero::query()->latest('created_at')->paginate(10);

        return view('backoffice.hero.index', compact('heroes'));
    }

    public function create(): View
    {
        return view('backoffice.hero.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'ribbon' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:10000'],
            'banner' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
        ]);

        $validated['banner'] = $request->file('banner')->store('hero', 'public');
        $validated['created_by'] = $request->user()->getKey();
        Hero::create($validated);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $hero = Hero::query()->findOrFail($id);

        return view('backoffice.hero.show', compact('hero'));
    }

    public function edit(string $id): View
    {
        $hero = Hero::query()->findOrFail($id);

        return view('backoffice.hero.edit', compact('hero'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $hero = Hero::query()->findOrFail($id);
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'ribbon' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:10000'],
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:1024'],
        ]);

        if ($request->hasFile('banner')) {
            $newBanner = $request->file('banner')->store('hero', 'public');
            if ($hero->banner) {
                Storage::disk('public')->delete($hero->banner);
            }
            $validated['banner'] = $newBanner;
        }

        $hero->update($validated);

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Hero::query()->findOrFail($id)->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil dihapus.');
    }
}
