<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_no' => $this->faker->unique()->randomNumber(8),
            "full_name" => $this->faker->name,
            'mobile' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            "profile_image" => null,
            "gender" => $this->faker->randomElement(['Male', 'Female']),
            "native_place" => $this->faker->city,
            "date_of_birth" => $this->faker->date,
            "place_of_birth" => $this->faker->state,
            "martial_status" => $this->faker->randomElement(['Unmarried', 'Engagement Broken', 'Widowed', 'Divorced', 'Separated']),
            "caste" => $this->faker->randomElement(['Caste B', 'Caste C', 'Caste D', 'Caste F', 'Caste A']),
            "sub_caste" => $this->faker->randomElement(['Sub Caste 1', 'Sub Caste 2', 'Sub Caste 3', 'Sub Caste 5', 'Sub Caste 6']),
            "mother_tongue" => $this->faker->randomElement(['Gujarati', 'Hindi', 'Marwari']),
            "height" => $this->faker->numberBetween(140, 250),
            "weight" => $this->faker->numberBetween(40, 110),
            "blood_group" => $this->faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
            "handicap" => $this->faker->randomElement([1, 0]),
            "handicap_details" => $this->faker->randomElement([$this->faker->text, null, null]),
            "qualification" => $this->faker->randomElement(['SSC', 'HSC', 'GRADUATE', 'POST-GRADUATE', 'OTHER']),
            "education_medium" => $this->faker->randomElement(['English', 'Hindi', 'Gujarati']),
            "occupation" => $this->faker->randomElement(['Software Engineering', 'Software Developer', 'Self Employed', 'Accountant', 'Labour', 'Driver']),
            "occupation_details" => $this->faker->randomElement(['Working for 2 years', 'Working for 1 years', 'Working for 4 years', null, null]),
            "occupation_address" => $this->faker->address,
            "income" => $this->faker->randomElement(['3', '5', '10', '25', '7.5', '9.2', '15']),
            "alternative_mobile" => $this->faker->unique()->phoneNumber,
            "residential_address" => $this->faker->address,
            "married_brothers" => $this->faker->randomElement([0, 1, 2, 3, 4, 1, 2, 0, 1]),
            "unmarried_brothers" => $this->faker->randomElement([0, 1, 2, 3, 4, 1, 2, 0, 1]),
            "married_sisters" => $this->faker->randomElement([0, 1, 2, 3, 4, 1, 2, 0, 1]),
            "unmarried_sisters" => $this->faker->randomElement([0, 1, 2, 3, 4, 1, 2, 0, 1]),
            "mosal_residential_address" => $this->faker->address,
            "mosal_mobile" => $this->faker->unique()->phoneNumber,


            "status" => $this->faker->randomElement(['Approved', 'Rejected', 'Pending', null, null]),
            "confirmation" => 1,
            "password" => bcrypt('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
