<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsAdminController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(20);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form', ['news' => new News()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news = News::create($data);

        $this->storeMedia($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новину створено.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        $this->storeMedia($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Новину оновлено.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        foreach ($news->media as $media) {
            if ($media->path) {
                Storage::disk('public')->delete($media->path);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Новину видалено.');
    }

    public function destroyMedia(News $news, NewsMedia $media)
    {
        abort_unless($media->news_id === $news->id, 404);

        if ($media->path) {
            Storage::disk('public')->delete($media->path);
        }

        $media->delete();

        return redirect()->route('admin.news.edit', $news)->with('success', 'Медіафайл видалено.');
    }

    private function storeMedia(Request $request, News $news): void
    {
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                NewsMedia::create([
                    'news_id' => $news->id,
                    'type' => 'photo',
                    'path' => $photo->store('news/gallery', 'public'),
                ]);
            }
        }

        $videoUrls = array_filter(array_map('trim', explode("\n", (string) $request->input('video_urls'))));
        foreach ($videoUrls as $url) {
            NewsMedia::create([
                'news_id' => $news->id,
                'type' => 'video',
                'url' => $url,
            ]);
        }
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'body_en' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'max:5120'],
            'video_urls' => ['nullable', 'string'],
        ]);
    }
}
