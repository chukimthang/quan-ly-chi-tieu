<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Chử Kim Thắng',
            'email' => 'chukimthang94@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',  
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Chử Kim Lợi',
            'email' => 'loi@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',  
            'is_admin' => 0
        ]);

        DB::table('users')->insert([
            'name' => 'Lưu Đức Phú',
            'email' => 'phu@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSWXoGSJC7rKeQjngG-7dfU03Aa7vZ9V0kcBPOuiFc0ltTMmUQg',  
            'is_admin' => 0
        ]);
    }
}
