<?php

namespace App\Models;

use App\Constants\DatabaseTableConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {

    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DatabaseTableConstant::COMMENTS;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'username',
        'message',
        'parent_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
    ];

    /**
     * Checks if the object is empty.
     * @return bool
     */
    public function isEmpty(): bool {
        return empty($this->id);
    }

    /**
     * Get the entity id.
     * @return int
     */
    public function getId(): int {
        return (int) $this->id;
    }

    /**
     * Get comment replies.
     * @return HasMany
     */
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id')->limit(1);
    }
}
