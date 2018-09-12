<?php
/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/10
 * Time: 15:51
 */

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{

    protected $fillable = ['commenter', 'email', 'comment'];

    public function post(){
        return $this->belongsTo('Post');
    }

    public function getApprovedAttribute($approved){
        return (intval($approved) == 1) ? 'yes' : 'no';
    }

    public function setApprovedAttribute($approved){
        $this->attributes['approved'] = ($approved === 'yes') ? 1 : 0;
    }

}
