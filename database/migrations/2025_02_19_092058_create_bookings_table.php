<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("personal_ID");
            $table->unsignedBigInteger("service_id");
            $table->unsignedBigInteger("reservation_ID");
            $table->string("email", 50);
            $table->date("booking_date");
            $table->string("time_slot",50);
            $table->enum("status",["pending","approved","declined","ongoing","in progress","done"]);
            $table->timestamps();

            $table->foreign("personal_ID")->references("id")->on("personal_information")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("service_id")->references("id")->on("service_types")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("reservation_ID")->references("id")->on("reservation_schedule")->onDelete("cascade")->onUpdate("cascade");

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
