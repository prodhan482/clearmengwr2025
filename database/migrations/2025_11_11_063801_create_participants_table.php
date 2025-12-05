<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('date_taken')->nullable();  // Date Taken
            $table->string('location')->nullable();  // Location
            $table->string('camera_no')->nullable();  // Camera No.
            $table->string('name')->nullable();  // Participant Name
            $table->string('email')->nullable()->index();  // Email Address
            $table->string('phone')->nullable()->index();

            // Google Drive file IDs
            $table->string('drive_video_file_id')->nullable()->index();
            $table->string('drive_image_file_id')->nullable()->index();

            // Library and serial fields
            $table->string('image_library_file_no')->nullable();
            $table->string('video_library_file_no')->nullable();
            $table->string('video_chain_serial')->nullable()->index();
            $table->string('action_performed')->nullable();
            $table->string('video_length')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
