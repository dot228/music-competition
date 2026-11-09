<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['category', 'work_title', 'work_description', 'work_link', 'work_file']);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->string('institution')->after('city');
            $table->string('study_year')->after('institution');
            $table->string('teacher_name')->after('study_year');
            $table->string('specialty')->after('teacher_name');

            $table->string('piece1_composer')->after('specialty');
            $table->string('piece1_title')->after('piece1_composer');
            $table->string('piece1_duration')->after('piece1_title');
            $table->string('piece2_composer')->after('piece1_duration');
            $table->string('piece2_title')->after('piece2_composer');
            $table->string('piece2_duration')->after('piece2_title');
            $table->string('program_duration')->after('piece2_duration');

            $table->string('video_link')->after('program_duration');
            $table->text('bio')->after('video_link');

            $table->string('guardian_name')->after('bio');
            $table->string('age_document')->after('phone');

            $table->boolean('agree_rules')->default(false)->after('age_document');
            $table->boolean('agree_privacy')->default(false)->after('agree_rules');
            $table->boolean('agree_media')->default(false)->after('agree_privacy');
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'institution', 'study_year', 'teacher_name', 'specialty',
                'piece1_composer', 'piece1_title', 'piece1_duration',
                'piece2_composer', 'piece2_title', 'piece2_duration', 'program_duration',
                'video_link', 'bio', 'guardian_name', 'age_document',
                'agree_rules', 'agree_privacy', 'agree_media',
            ]);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->string('category')->after('city');
            $table->string('work_title')->after('category');
            $table->text('work_description')->nullable()->after('work_title');
            $table->string('work_link')->nullable()->after('work_description');
            $table->string('work_file')->nullable()->after('work_link');
        });
    }
};
