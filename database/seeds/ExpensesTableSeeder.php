<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExpensesTableSeeder extends Seeder
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
            DB::table('expenses')->insert([
                'name' => str_random(10),
                'price' => $faker->numberBetween(10, 100) * 1000, 
                'description' => $faker->text(200),
                'category_id' => $faker->numberBetween(1, 7),
                'user_id' => $faker->numberBetween(1, 3), 
                'created_at' => Carbon::createFromTimestamp(
                    rand(strtotime('2017-02-1'), strtotime('2015-04-19')))
                    ->format('Y-m-d h:i:s')
            ]);
        }
    }
}
