<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'body',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getPost($slug){
        return $this->where('slug', $slug)->first();
    }

    public function getEditPost($user_id, $post_slug){
        $post = $this->where('user_id',$user_id)->where('slug',$post_slug)->first();
        return $post;
    }
}
