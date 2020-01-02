<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    /**
     * Eloquent grammars can read multiple schema relationships
     * within the same database instance.
     *
     * Just like the regular mysql query, you can declare multiple database relationships
     * override the $table to 'database-name.table_name'
     */

    // protected $table = 'eloquent-test2.posts';

    protected $connection = 'mysql2';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
