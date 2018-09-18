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

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'comment_count',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

}
