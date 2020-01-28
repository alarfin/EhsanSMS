<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('company')->nullable();
            $table->text('address')->nullable();
            $table->float('sms_rate', 12, 2)->default(0.30);
            $table->string('role');
            $table->string('sender_id');
            $table->string('api_key');
            $table->timestamp('join_date')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
