<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public const AWARDS = [
        'grand_prix' => 'Гран-прі',
        'laureate_1' => 'Лауреат I ступеня',
        'laureate_2' => 'Лауреат II ступеня',
        'laureate_3' => 'Лауреат III ступеня',
        'diploma' => 'Дипломант',
        'special' => 'Спеціальна нагорода / партнерська відзнака',
    ];

    protected $fillable = [
        'category',
        'award',
        'participant_name',
        'work_title',
        'description',
    ];

    public function awardLabel(): string
    {
        return self::AWARDS[$this->award] ?? $this->award;
    }

    public function awardIcon(): string
    {
        return match ($this->award) {
            'grand_prix' => '🏆',
            'laureate_1' => '🥇',
            'laureate_2' => '🥈',
            'laureate_3' => '🥉',
            'diploma' => '📜',
            'special' => '⭐',
            default => '',
        };
    }
}
