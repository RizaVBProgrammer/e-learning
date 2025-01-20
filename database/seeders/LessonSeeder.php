<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'title' => 'Belajar Angka 1-10',
            'description' => 'Video animasi belajar mengenal angka dari 1 hingga 10.',
            'youtube_link' => 'https://www.youtube.com/watch?v=jufQOPo6fhg',
        ]);

        Lesson::create([
            'title' => 'Belajar Huruf A-Z',
            'description' => 'Video animasi belajar mengenal huruf dari A hingga Z.',
            'youtube_link' => 'https://www.youtube.com/watch?v=jufQOPo6fhg',
        ]);

        // Tambahkan lebih banyak pelajaran sesuai kebutuhan
    }
}
