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
        Schema::create('client_payments', function (Blueprint $table) {
            $table->id();
            $table->integer("booking_id");
            $table->integer("service_id");
            $table->integer("personal_ID");
            $table->date("payment_date");
            $table->enum("status",["done"]);
            $table->timestamps();

            $table->foreign("booking_id")->references("id")->on("bookings")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("service_id")->references("id")->on("service_types")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("personal_ID")->references("id")->on("personal_information")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_payments');
    }
};
