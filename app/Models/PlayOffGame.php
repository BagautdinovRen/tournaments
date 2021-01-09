<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayOffGame extends Model
{
    use HasFactory;

    protected $fillable = ['round', 'group_id', 'tournament_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
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
