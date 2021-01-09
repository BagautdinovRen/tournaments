<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 * @package App\Models
 */
class Player extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classCharacter()
    {
        return $this->belongsTo(ClassCharacter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_player');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function winDuels()
    {
        return $this->hasMany(Duel::class, 'winner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loseDuels()
    {
        return $this->hasMany(Duel::class, 'loser');
    }
}
