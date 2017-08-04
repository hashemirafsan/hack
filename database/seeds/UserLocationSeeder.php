<?php

use Illuminate\Database\Seeder;
use App\UserLocation;

class UserLocationSeeder extends Seeder
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
                'user_id' => '1',
                'home_lat' => '25.171614',
                'home_lng' => '92.018330',
                'current_lat' => '24.917209',
                'current_lng' => '91.831899'
            ],
            [
                'user_id' => '2',
                'home_lat' => '24.640386',
                'home_lng' => '92.228328',
                'current_lat' => '24.917209',
                'current_lng' => '91.831899'
            ],
            [
                'user_id' => '3',
                'home_lat' => '25.169544',
                'home_lng' => '91.886726',
                'current_lat' => '24.917209',
                'current_lng' => '91.831899'
            ],
            [
                'user_id' => '4',
                'home_lat' => '24.301893',
                'home_lng' => '91.760103',
                'current_lat' => '24.917209',
                'current_lng' => '91.831899'
            ]
        ];

        foreach($data as $data)
        {
            UserLocation::forceCreate($data);
        }
    }
}
