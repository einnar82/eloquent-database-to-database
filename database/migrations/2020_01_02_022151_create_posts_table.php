<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // After we added the another mysql connection settings, call the connection function from
        // the Schema Class to specify the database connection path of the table
        Schema::connection('mysql2')->create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(1);
            $table->longText('content')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('posts');
    }
}
