<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OpdController extends Controller
{
    public function index(): View
    {
        $opds = Opd::query()->orderBy('no_urut')->orderBy('nama_opd')->paginate(10);

        return view('backoffice.opd.index', compact('opds'));
    }

    public function create(): View
    {
        return view('backoffice.opd.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);
        $validated['created_by'] = $request->user()->getKey();
        Opd::create($validated);

        return redirect()->route('admin.opd.index')->with('success', 'OPD berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $opd = Opd::query()->findOrFail($id);

        return view('backoffice.opd.show', compact('opd'));
    }

    public function edit(string $id): View
    {
        $opd = Opd::query()->findOrFail($id);

        return view('backoffice.opd.edit', compact('opd'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $opd = Opd::query()->findOrFail($id);
        $opd->update($this->validatedData($request));

        return redirect()->route('admin.opd.index')->with('success', 'OPD berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Opd::query()->findOrFail($id)->delete();

        return redirect()->route('admin.opd.index')->with('success', 'OPD berhasil dihapus.');
    }

    /**
     * @return array{nama_opd: string, no_urut: int}
     */
    private function validatedData(Request $request): array
    {
        return $request->validate([
            'nama_opd' => ['required', 'string', 'max:255'],
            'no_urut' => ['required', 'integer', 'min:1', 'max:999'],
        ]);
    }
}
