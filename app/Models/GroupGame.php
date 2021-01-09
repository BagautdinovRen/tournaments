<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupGame
 * @package App\Models
 */
class GroupGame extends Model
{
    use HasFactory;

    protected $fillable = ['round', 'group_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function players()
    {
        return $this->morphToMany(Player::class, 'game');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function duels()
    {
        return $this->morphMany(Duel::class, 'game');
    }
}
