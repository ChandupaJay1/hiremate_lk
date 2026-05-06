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
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropPrimary('email');
            $table->dropColumn('email');
            $table->string('phone_number')->primary()->first();
            // Optional: change token to otp if you want, but we can reuse 'token' column to store OTP.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropPrimary('phone_number');
            $table->dropColumn('phone_number');
            $table->string('email')->primary();
        });
    }
};
