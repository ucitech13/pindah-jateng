<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoController extends Controller
{
    public function index(): View
    {
        $videos = Video::query()->latest('created_at')->paginate(10);

        return view('backoffice.video.index', compact('videos'));
    }

    public function create(): View
    {
        return view('backoffice.video.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedLink($request);
        $validated['created_by'] = $request->user()->getKey();
        Video::create($validated);

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $video = Video::query()->findOrFail($id);

        return view('backoffice.video.show', compact('video'));
    }

    public function edit(string $id): View
    {
        $video = Video::query()->findOrFail($id);

        return view('backoffice.video.edit', compact('video'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $video = Video::query()->findOrFail($id);
        $video->update($this->validatedLink($request));

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Video::query()->findOrFail($id)->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus.');
    }

    /**
     * @return array{source_link: string}
     */
    private function validatedLink(Request $request): array
    {
        return $request->validate([
            'source_link' => [
                'required',
                'string',
                'url',
                'max:65535',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if (! is_string($value) || Video::youtubeIdFrom($value) === null) {
                        $fail('Tautan harus berupa tautan YouTube yang valid.');
                    }
                },
            ],
        ]);
    }
}
