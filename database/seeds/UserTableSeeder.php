<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
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
                'name' => 'Sudipto Chowdhury',
                'email' => 'dip.chy93@gmail.com',
                'password' => bcrypt('123456'),
                'is_alpha' => '1'
            ],
            [
                'name' => 'Rafsan Jani',
                'email' => 'rafsanhashemi@gmail.com',
                'password' => bcrypt('123456'),
                'is_alpha' => '0'
            ],
            [
                'name' => 'HB Shifat',
                'email' => 'hbshifat30@gmail.com',
                'password' => bcrypt('123456'),
                'is_alpha' => '0'
            ],
            [
                'name' => 'Kollol Chakraborty',
                'email' => 'dazzling.cloudlet@gmail.com',
                'password' => bcrypt('123456'),
                'is_alpha' => '0'
            ]
            
        ];

        foreach($data as $data)
        {
            User::forceCreate($data);
        }
    }
}
