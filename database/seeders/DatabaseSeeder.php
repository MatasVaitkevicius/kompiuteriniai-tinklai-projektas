<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ //1
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //1
            'name' => "admin2",
            'email' => "admin2@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //1
            'name' => "admin3",
            'email' => "admin3@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //1
            'name' => "admin4",
            'email' => "admin4@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //2
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'user',
            'created_at' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //2
            'name' => "user2",
            'email' => "user2@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'user',
            'created_at' => '2020-10-09 17:11:11',
        ]);
        DB::table('users')->insert([ //2
            'name' => "user3",
            'email' => "user3@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'user',
            'created_at' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //2
            'name' => "user4",
            'email' => "user4@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'user',
            'created_at' => '2019-10-10 17:11:11',
        ]);

        DB::table('users')->insert([ //3
            'name' => "director",
            'email' => "director@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'director',
            'created_at' => '2019-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //3
            'name' => "director2",
            'email' => "director2@gmail.com",
            'password' => Hash::make('123456'),
            'user_type' => 'director',
            'created_at' => '2019-09-09 17:11:11',
        ]);

        DB::table('rooms')->insert([ //3
            'room_type' => 'single',
            'room_price' => 45.55,
            'wifi' => 1,
            'tv' => 0,
            'reservation_count' => 0,
            'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4i761kIoOPfD_WoWbMAp0ACMslbAc_tOEdw&usqp=CAU'
        ]);

        DB::table('rooms')->insert([ //3
            'room_type' => 'single',
            'room_price' => 50,
            'wifi' => 1,
            'tv' => 0,
            'reservation_count' => 0,
            'img_url' => 'https://image.shutterstock.com/image-photo/poster-above-white-cabinet-plant-260nw-1173139144.jpg'
        ]);



        DB::table('rooms')->insert([ //3
            'room_type' => 'double',
            'room_price' => 87.99,
            'wifi' => 1,
            'tv' => 1,
            'reservation_count' => 0,
            'img_url' => 'https://rnb.scene7.com/is/image/roomandboard/modernStyle?wid=960&hei=700&$mild$'
        ]);
        DB::table('rooms')->insert([ //3
            'room_type' => 'double',
            'room_price' => 55,
            'wifi' => 1,
            'tv' => 0,
            'reservation_count' => 0,
            'img_url' => 'https://cdn.decoist.com/wp-content/uploads/2020/02/Beautiful-small-white-living-room-blends-monochromatic-beauty-with-modernity-53868.jpg'
        ]);

        DB::table('rooms')->insert([ //3
            'room_type' => 'triple',
            'room_price' => 100,
            'wifi' => 1,
            'tv' => 1,
            'reservation_count' => 0,
            'img_url' => 'https://i.pinimg.com/originals/82/a6/1a/82a61a4ffb1b4eb00072fa8dc6438eae.jpg'
        ]);
        DB::table('rooms')->insert([ //3
            'room_type' => 'triple',
            'room_price' => 215,
            'wifi' => 1,
            'tv' => 1,
            'reservation_count' => 0,
            'img_url' => 'https://www.thespruce.com/thmb/X_uj4i4TdVrORb3ec1yrbHoq83k=/2032x1475/filters:fill(auto,1)/GettyImages-1187200939-74336d2a866d4c99853f700cb4ad7d5f.jpg'
        ]);
    }
}
