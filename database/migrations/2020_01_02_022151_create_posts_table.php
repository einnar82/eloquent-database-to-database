<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * The database schema.
     *
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;
    /**
     * Create a new migration instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->schema = Schema::connection($this->getConnection());
    }
    /**
     * Get the migration connection name.
     *
     * @return string|null
     */
    public function getConnection()
    {
        return 'mysql2';
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            $this->schema->create('posts', function (Blueprint $table) {
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
         $this->schema->dropIfExists('posts');
    }
}
