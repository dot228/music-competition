<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ContactMessage;
use App\Models\GalleryImage;
use App\Models\News;
use App\Models\Result;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'applications' => Application::count(),
            'newApplications' => Application::where('status', 'new')->count(),
            'news' => News::count(),
            'results' => Result::count(),
            'gallery' => GalleryImage::count(),
            'users' => User::count(),
            'contactMessages' => ContactMessage::count(),
        ];

        $recentApplications = Application::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentApplications'));
    }
}
