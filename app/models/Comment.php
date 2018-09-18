<?php
/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/10
 * Time: 15:51
 */

namespace App\models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Comment
 * @package App\models
 */
class Comment extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'commenter', 'email', 'comment'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('Post');
    }

    /**
     * @param $approved
     * @return string
     */
    public function getApprovedAttribute($approved)
    {
        return (intval($approved) == 1) ? 'yes' : 'no';
    }

    /**
     * @param $approved
     */
    public function setApprovedAttribute($approved)
    {
        $this->attributes['approved'] = ($approved === 'yes') ? 1 : 0;
    }

}
