<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    public const TOPICS = [
        'participation' => 'Участь у Конкурсі',
        'technical' => 'Технічна проблема із заявкою',
        'partnership' => 'Партнерство',
        'media' => 'Медіа',
        'other' => 'Інше',
    ];

    protected $fillable = [
        'topic',
        'name',
        'email',
        'phone',
        'message',
        'agree_privacy',
    ];

    protected $casts = [
        'agree_privacy' => 'boolean',
    ];

    public function topicLabel(): string
    {
        return self::TOPICS[$this->topic] ?? $this->topic;
    }
}
