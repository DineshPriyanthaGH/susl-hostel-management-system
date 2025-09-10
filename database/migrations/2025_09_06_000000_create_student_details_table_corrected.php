<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->enum('title', ['Mr.', 'Mrs.', 'Rev.']);
            $table->string('full_name');
            $table->string('name_with_initials');
            $table->string('nic', 20)->unique();
            $table->date('date_of_birth');
            $table->string('mobile_number', 15);
            $table->string('email')->unique();
            $table->text('permanent_address');
            $table->string('guardian_name');
            $table->string('guardian_mobile', 15);
            $table->text('guardian_address');
            $table->string('year_1_hostel', 100)->nullable();
            $table->string('year_2_hostel', 100)->nullable();
            $table->string('year_3_hostel', 100)->nullable();
            $table->string('year_4_hostel', 100)->nullable();
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index('mobile_number');
            $table->index('nic');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_details');
    }
};
