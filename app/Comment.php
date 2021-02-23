<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Gallery;

class Comment extends Model
{
    protected $fillable = ['user_id', 'gallery_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }
}
