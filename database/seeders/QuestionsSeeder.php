<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Questions;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              \App\Models\Questions::factory(100)->create();
    }
}
