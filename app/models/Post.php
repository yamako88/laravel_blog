<?php
/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/10
 * Time: 15:50
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{

    protected $fillable = ['title', 'content'];

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function user(){
        return $this->belongsTo('User');
    }

}