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
        //
        // Also added some logic in migration, since it didn't created the migrations table
        // in able to check if the migration exists.
        if (!Schema::connection('mysql2')->hasTable('posts')) {
            Schema::connection('mysql2')->create('posts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_id')->default(1);
                $table->longText('content')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::connection('mysql2')->hasTable('posts')) {
            Schema::connection('mysql2')->drop('posts');
        }
    }
}
