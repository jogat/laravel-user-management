<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('first_name',255)->default('');
            $table->string('last_name',255)->default('');
            $table->date('date_of_birthday')->nullable();
            $table->longText('note')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));  
                        
            
        });

        // Schema::create('contact', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        // });

        Schema::create('contact_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('contact_id');
            $table->string('meta_type',255)->default('');
            $table->longText('meta_value')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));            

            
        });

        // Schema::create('contact_meta', function (Blueprint $table) {
        //     $table->foreign('contact_id')->references('id')->on('contact');
        // });

        Schema::create('contact_relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('contact_host_id');
            $table->unsignedBigInteger('contact_guest_id');
            $table->boolean('blocked')->default(0);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));            

            
        });

        // Schema::create('contact_relationships', function (Blueprint $table) {
        //     $table->foreign('contact_host_id')->references('id')->on('users');
        //     $table->foreign('contact_guest_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {                
        Schema::dropIfExists('contact');
        Schema::dropIfExists('contact_meta');
        Schema::dropIfExists('contact_relationships');        
    }
}
