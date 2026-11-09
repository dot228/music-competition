<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'title_en',
        'body',
        'body_en',
        'image_path',
    ];

    public function localizedTitle(): string
    {
        if (app()->getLocale() === 'en' && $this->title_en) {
            return $this->title_en;
        }

        return $this->title;
    }

    public function localizedBody(): string
    {
        if (app()->getLocale() === 'en' && $this->body_en) {
            return $this->body_en;
        }

        return $this->body;
    }

    public function media()
    {
        return $this->hasMany(NewsMedia::class)->orderBy('sort_order');
    }

    public function photos()
    {
        return $this->media()->where('type', 'photo');
    }

    public function videos()
    {
        return $this->media()->where('type', 'video');
    }
}
