<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CollectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1, 12) as $index) {
            DB::table('collects')->insert([
                'price' => $faker->numberBetween(100, 300) * 1000,
                'created_at' => Carbon::createFromTimestamp(
                    rand(strtotime('2017-02-1'), strtotime('2015-04-19')))
                    ->format('Y-m-d h:i:s')
        ]);
        }
    }
}
