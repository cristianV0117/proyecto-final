<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'books';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'publish_date',
        'author_id',
        'description',
        'price',
        'genre_id',
        'editorial_id',
        'warehouse_id',
        'created_at'
    ];

    protected $hidden = [
        'password'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
