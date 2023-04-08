<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $text
 * @property string $name
 * @property string $email
 * @property int|null $parent_id
 * @property string $commentable_type
 * @property int $commentable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $status
 * @property-read \Illuminate\Database\Eloquent\Collection|Comment[] $children
 * @property-read int|null $children_count
 * @property-read Model|\Eloquent $commentable
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereStatus($value)
 */
class Comment extends Model
{
    use HasFactory;

//    protected $dates = [''];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function children(){
        return $this->hasMany(Comment::class,'parent_id','id')
            ->where('status','ACCEPT');
    }
}
