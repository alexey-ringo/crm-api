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
        $data = [
            [
                'name' => 'Автор1',
                'email' => 'author1@g.g',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'Автор2',
                'email' => 'author2@g.g',
                'password' => bcrypt(str_random(16)),
            ],
            [
                'name' => 'Автор3',
                'email' => 'author3@g.g',
                'password' => bcrypt(str_random(16)),
            ]
        ];
        
        \DB::table('users')->insert($data);
    }
}
