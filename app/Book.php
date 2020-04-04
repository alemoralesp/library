<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $fillable = [
        'name', 'author', 'category_id', 'published_date', 'user_id'
    ];

    //
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

}
