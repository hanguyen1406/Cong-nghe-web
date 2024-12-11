<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $faker = Faker::create();

    // Thêm 100 bản ghi vào các bảng
    for ($i = 0; $i < 100; $i++) {
        // Chèn vào bảng 'libraries' và lấy ID của thư viện vừa thêm
        $libraryId = DB::table('libraries')->insertGetId([
            'name' => $faker->company,
            'address' => $faker->address,
            'contact_number' => $faker->phoneNumber,
        ]);

        // Chèn vào bảng 'books' và sử dụng $libraryId
        DB::table('books')->insert([
            'title' => $faker->sentence,
            'author' => $faker->name,
            'publication_year' => $faker->year,
            'genre' => $faker->word,
            'library_id' => $libraryId, // Lấy ID thư viện vừa chèn
        ]);

        // Chèn vào bảng 'renters' và lấy ID của người thuê
        $renterId = DB::table('renters')->insertGetId([
            'name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'email' => $faker->unique()->email,
        ]);

        // Chèn vào bảng 'laptops' và sử dụng $renterId
        DB::table('laptops')->insert([
            'brand' => $faker->company,
            'model' => $faker->word,
            'specifications' => $faker->sentence,
            'rental_status' => rand(0, 1),
            'renter_id' => $renterId, // Lấy ID người thuê vừa chèn
        ]);

        // Chèn vào bảng 'it_centers'
        $itCenterId = DB::table('it_centers')->insertGetId([
            'name' => $faker->company,
            'location' => $faker->address,
            'contact_email' => $faker->unique()->email,
        ]);

        // Chèn vào bảng 'hardware_devices' và sử dụng $itCenterId
        DB::table('hardware_devices')->insert([
            'device_name' => $faker->word,
            'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
            'status' => rand(0, 1),
            'center_id' => $itCenterId, // Lấy ID trung tâm IT vừa chèn
        ]);

        // Chèn vào bảng 'cinemas'
        $cinemaId = DB::table('cinemas')->insertGetId([
            'name' => $faker->company,
            'location' => $faker->address,
            'total_seats' => rand(100, 500),
        ]);

        // Chèn vào bảng 'movies' và sử dụng $cinemaId
        DB::table('movies')->insert([
            'title' => $faker->sentence,
            'director' => $faker->name,
            'release_date' => $faker->date,
            'duration' => rand(60, 200),
            'cinema_id' => $cinemaId, // Lấy ID rạp chiếu phim vừa chèn
        ]);
    }
}

}
