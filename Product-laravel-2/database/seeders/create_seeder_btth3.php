<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



class create_seeder_btth3 extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {

            //bài 1
            $medicineId = DB::table('medicines')->insertGetId([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['100mg', '200mg', '500mg']),
                'form' => $faker->randomElement(['Viên nén', 'viên nang', 'xi-rô']),
                'price' => $faker->randomFloat(2, 1, 100), // Giá từ 1 đến 100 với 2 chữ số thập phân
                'stoke' => $faker->numberBetween(0, 1000), // Số lượng tồn kho từ 0 đến 1000
            ]);
            DB::table('sales')->insert([
                'medicine_id' =>$medicineId, 
                'quantity' => $faker->numberBetween(1, 100),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->regexify('[0-9]{10}'),
            ]);

            //bài 2
            $classId = DB::table('classes')->insertGetId([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->randomNumber(2, 100),

            ]);
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date,
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $classId,
            ]);


            //bài 3
            $urgencies = ['Low', 'Medium', 'High'];
            $statuses = ['Open', 'In Progress', 'Resolved'];
                $computerId = DB::table('computers')->insertGetId([
                    'computer_name' => $faker->word,
                    'model' => $faker->word,
                    'operating_system' => $faker->word,
                    'processor' => $faker->word,
                    'memory' => $faker->numberBetween(1, 100),
                    'available' => $faker->boolean,
                    
                ]);
                DB::table('issues')->insert([
                    'computer_id' => $computerId,
                    'reported_by' => $faker->name,
                    'reported_date' => $faker->dateTimeBetween('-1 month'),
                    'description' => $faker->paragraph,
                    'urgency' => $urgencies[array_rand($urgencies)], // Chọn ngẫu nhiên một giá trị từ mảng urgencies
                    'status' => $statuses[array_rand($statuses)], // Chọn ngẫu nhiên một giá trị từ mảng statuses
                ]);


        }
    }
}
