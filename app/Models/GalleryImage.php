<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    public const COLLECTIONS = [
        'zhytomyr' => 'Житомир — місто Святослава Ріхтера',
        'locations' => 'Локації Конкурсу',
        'preparation' => 'Підготовка',
        'participants' => 'Учасники та репетиції',
        'live-round' => 'Очний конкурсний відбір — 26 лютого',
        'awards' => 'Нагородження і гала-концерт — 27 лютого',
        'video' => 'Відео',
    ];

    protected $fillable = [
        'title',
        'collection',
        'type',
        'image_path',
        'video_url',
    ];

    public function collectionLabel(): ?string
    {
        return self::COLLECTIONS[$this->collection] ?? null;
    }

    public function isVideo(): bool
    {
        return $this->type === 'video';
    }

    public function embedUrl(): ?string
    {
        if (!$this->isVideo() || !$this->video_url) {
            return null;
        }

        $id = null;

        if (preg_match('~youtu\.be/([A-Za-z0-9_-]+)~', $this->video_url, $m)) {
            $id = $m[1];
        } elseif (preg_match('~[?&]v=([A-Za-z0-9_-]+)~', $this->video_url, $m)) {
            $id = $m[1];
        } elseif (preg_match('~youtube\.com/embed/([A-Za-z0-9_-]+)~', $this->video_url, $m)) {
            $id = $m[1];
        }

        return $id ? "https://www.youtube.com/embed/{$id}" : $this->video_url;
    }
}
