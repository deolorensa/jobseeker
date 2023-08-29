<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 50; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		Candidate::insert([
                'email' => $faker->email,
                'phone_number' => $faker->randomNumber(9, true),
                'full_name' => $faker->name,
                'dob' => $faker->date,
                'pob' => $faker->city,
                'gender' => $faker->randomElement(['F', 'M']),
                'year_exp' => $faker->randomNumber(1),
                'last_salary' => $faker->randomNumber(7)
    		]);

    	}

        // Candidate::create([
        //     'email' => 'deo@gmail.com',
        //     'phone_number' => '085123123123',
        //     'full_name' => 'deo lorensa',
        //     'dob' => Carbon::create('2000', '05', '05'),
        //     'pob' => 'Blitar',
        //     'gender' => 'M',
        //     'year_exp' => '2',
        //     'last_salary' => '5000000'

        // ]);
        // Candidate::create([
        //     'email' => 'lorensa@gmail.com',
        //     'phone_number' => '085123123122',
        //     'full_name' => 'deo lorensa',
        //     'dob' => Carbon::create('2001', '05', '05'),
        //     'pob' => 'Blitar',
        //     'gender' => 'M',
        //     'year_exp' => '2',
        //     'last_salary' => '5000000'

        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
