<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LessonTag;

class LessonTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LessonTag::factory()->count(500)->create();
    }
}
