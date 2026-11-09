<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\GalleryImage;
use App\Models\News;
use App\Models\Result;

class PageController extends Controller
{
    public function home()
    {
        $latestNews = News::latest()->take(3)->get();

        return view('pages.home', compact('latestNews'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function jury()
    {
        return view('pages.jury');
    }

    public function juryHead()
    {
        return view('pages.jury-head');
    }

    public function participants()
    {
        return view('pages.participants');
    }

    public function gallery(\Illuminate\Http\Request $request)
    {
        $collection = $request->query('collection');
        $collections = GalleryImage::COLLECTIONS;

        $query = GalleryImage::latest();
        if ($collection && array_key_exists($collection, $collections)) {
            $query->where('collection', $collection);
        }

        $images = $query->paginate(12)->withQueryString();

        return view('pages.gallery', compact('images', 'collections', 'collection'));
    }

    public function results()
    {
        $results = Result::orderBy('category')
            ->orderByRaw("FIELD(award, 'grand_prix', 'laureate_1', 'laureate_2', 'laureate_3', 'diploma', 'special')")
            ->get()
            ->groupBy('category');

        $advanced = Application::where('status', 'approved')
            ->orderBy('full_name')
            ->get()
            ->groupBy('specialty');

        return view('pages.results', compact('results', 'advanced'));
    }

    public function news()
    {
        $news = News::latest()->paginate(9);

        return view('pages.news', compact('news'));
    }

    public function newsShow(News $news)
    {
        $news->load('media');

        return view('pages.news-show', compact('news'));
    }

    public function partners()
    {
        return view('pages.partners');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}
