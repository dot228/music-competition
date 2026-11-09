<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public const STATUSES = [
        'new' => 'Нова',
        'approved' => 'Допущено до очного туру',
        'rejected' => 'Не допущено до очного туру',
    ];

    public const SPECIALTIES = [
        'piano' => 'Фортепіано',
        'violin' => 'Скрипка',
        'cello' => 'Віолончель',
        'flute' => 'Флейта',
    ];

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone',
        'birth_date',
        'city',
        'institution',
        'study_year',
        'teacher_name',
        'specialty',
        'piece1_composer',
        'piece1_title',
        'piece1_duration',
        'piece2_composer',
        'piece2_title',
        'piece2_duration',
        'program_duration',
        'video_link',
        'bio',
        'guardian_name',
        'age_document',
        'agree_rules',
        'agree_privacy',
        'agree_media',
        'status',
        'admin_comment',
        'result_notified_at',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'agree_rules' => 'boolean',
        'agree_privacy' => 'boolean',
        'agree_media' => 'boolean',
        'result_notified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusLabel(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function specialtyLabel(): string
    {
        return self::SPECIALTIES[$this->specialty] ?? $this->specialty;
    }

    public function registrationNumber(): string
    {
        return sprintf('RJC-2027-%06d', $this->id);
    }

    public function hasResult(): bool
    {
        return in_array($this->status, ['approved', 'rejected'], true);
    }
}
