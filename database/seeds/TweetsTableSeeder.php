<?php
use App\Tweet;

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tweet::class, 10)->create([
            'user_id' => 1
            ]);
    }
}
