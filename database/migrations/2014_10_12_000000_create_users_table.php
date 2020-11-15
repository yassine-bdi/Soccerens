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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_image')->nullable();    
            $table->string('cover_image')->nullable();       
            $table->string('password');
            $table->string('birth_date'); 
            $table->string('about')->nullable(); 
            $table->string('title')->nullable(); 
            $table->string('country')->nullable(); 
            $table->string('social')->nullable(); 
            $table->string('role')->nullable(); 
            $table->rememberToken();
            $table->timestamps();
            $table->engine = "InnoDB"; 
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
