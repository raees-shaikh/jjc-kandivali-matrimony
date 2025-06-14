<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "profile_no" => '321684321',
            "full_name" => "Testing User",
            "mobile" => '1234567890',
            "email" => 'user@test.com',
            "profile_image" => null,
            "gender" => 'Male',
            "native_place" => 'Mumbai',
            "date_of_birth" => Carbon::parse('01-01-1996'),
            "place_of_birth" => 'Delhi',
            "martial_status" => 'Unmarried',
            "caste" => 'Caste A',
            "sub_caste" => 'Sub Caste 1',
            "mother_tongue" => 'Hindi',
            "manglik" => '0',
            "height" => '175',
            "weight" => '70',
            "blood_group" => 'A-',
            'qualification' => 'GRADUATE',
            'education_medium' => 'English',
            "occupation" => 'Software Engineering',
            "occupation_details" => 'Working for 5 years',
            "occupation_address" => 'Mumbai - 400 001, Maharashtra.',
            "income" => '4.5',
            'alternative_mobile' => '1234567891',
            "residential_address" => 'Mumbai - 400 010, Maharashtra.',
            "married_brothers" => 0,
            "unmarried_brothers" => 1,
            "married_sisters" => 1,
            "unmarried_sisters" => 2,
            "mosal_name" => "Mosale Testing Name",
            "mosal_residential_address" => 'Mumbai - 400 012, Maharashtra.',
            "mosal_mobile" => '1234567892',


            "status" => 'Approved',
            "confirmation" => 1,
            "password" => bcrypt('password'),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        // User::factory()->count(30)->create();
    }
}
