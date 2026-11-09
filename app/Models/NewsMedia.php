<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_id',
        'type',
        'path',
        'url',
        'sort_order',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function embedUrl(): ?string
    {
        if ($this->type !== 'video' || !$this->url) {
            return null;
        }

        $id = null;

        if (preg_match('~youtu\.be/([A-Za-z0-9_-]+)~', $this->url, $m)) {
            $id = $m[1];
        } elseif (preg_match('~[?&]v=([A-Za-z0-9_-]+)~', $this->url, $m)) {
            $id = $m[1];
        } elseif (preg_match('~youtube\.com/embed/([A-Za-z0-9_-]+)~', $this->url, $m)) {
            $id = $m[1];
        }

        return $id ? "https://www.youtube.com/embed/{$id}" : $this->url;
    }
}
