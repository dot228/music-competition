<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryAdminController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->paginate(24);

        return view('admin.gallery.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'collection' => ['nullable', 'string', 'in:' . implode(',', array_keys(GalleryImage::COLLECTIONS))],
            'images' => ['required', 'array'],
            'images.*' => ['image', 'max:5120'],
        ]);

        foreach ($request->file('images') as $file) {
            GalleryImage::create([
                'title' => $request->input('title'),
                'collection' => $request->input('collection') ?: null,
                'type' => 'photo',
                'image_path' => $file->store('gallery', 'public'),
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Фото додано.');
    }

    public function storeVideos(Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'collection' => ['nullable', 'string', 'in:' . implode(',', array_keys(GalleryImage::COLLECTIONS))],
            'video_urls' => ['required', 'string'],
        ]);

        $urls = array_filter(array_map('trim', explode("\n", $request->input('video_urls'))));

        foreach ($urls as $url) {
            GalleryImage::create([
                'title' => $request->input('title'),
                'collection' => $request->input('collection') ?: null,
                'type' => 'video',
                'image_path' => '',
                'video_url' => $url,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Відео додано.');
    }

    public function destroy(GalleryImage $gallery)
    {
        if ($gallery->type === 'photo' && $gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Видалено.');
    }
}
