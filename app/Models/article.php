<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $timestamps = false;

    protected $table = "article";

    protected $fillable = [
        'id',
        'name',
        'price',
        'Deleted',
        'Published'
    ];
}
