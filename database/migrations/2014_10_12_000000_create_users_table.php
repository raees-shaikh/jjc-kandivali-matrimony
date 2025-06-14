<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_no')->unique()->nullable();
            $table->string('filled_by')->nullable();
            $table->string('full_name')->nullable();
            $table->string('mobile')->unique();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('profile_image')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('native_place')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('martial_status', ['Unmarried', 'Engagement Broken', 'Widowed', 'Divorced', 'Separated'])->nullable();
            $table->string('status_of_children')->nullable();
            $table->string('no_of_children')->nullable();
            $table->string('caste')->nullable();
            $table->string('sub_caste')->nullable();
            $table->enum('mother_tongue', ['Gujarati', 'Hindi', 'Marwari', 'Kutchi'])->nullable();
            $table->boolean('manglik')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->enum('blood_group', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'])->nullable();
            $table->boolean('handicap')->nullable();
            $table->text('handicap_details')->nullable();
            $table->enum('qualification', ['SSC', 'HSC', 'GRADUATE', 'POST-GRADUATE', 'OTHER'])->nullable();
            $table->enum('education_medium', ['English', 'Hindi', 'Gujarati'])->nullable();
            $table->text('education_details')->nullable();
            $table->string('occupation')->nullable();
            $table->text('occupation_details')->nullable();
            $table->string('occupation_address')->nullable();
            $table->string('income')->nullable();
            $table->string('alternative_mobile')->nullable();
            $table->text('residential_address')->nullable();
            $table->string('married_brothers')->nullable();
            $table->string('unmarried_brothers')->nullable();
            $table->string('married_sisters')->nullable();
            $table->string('unmarried_sisters')->nullable();
            $table->string('mosal_name')->nullable();
            $table->string('mosal_residential_address')->nullable();
            $table->string('mosal_mobile')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('choice_of_life_partner')->nullable();
            $table->string('willing_to_settle_abroad')->nullable();
            $table->string('willing_to_marry_having_strictly_jain_foods')->nullable();
            $table->string('mumbai_contact_name')->nullable();
            $table->string('mumbai_contact_mobile')->nullable();
            $table->string('mumbai_contact_address')->nullable();
            $table->string('mumbai_contact_family_relation')->nullable();
            $table->enum('status', ['Approved', 'Rejected', 'Pending'])->nullable();
            $table->boolean('confirmation')->nullable();
            $table->string('ip_address')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
