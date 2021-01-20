<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Duel;

class PlayerController extends Controller
{
    public function index(): string
    {
        $players = Player::with('country', 'tournaments', 'classCharacter')->orderBy('name')->get();
        //$player['countWinDuels'] = Duel::where('winner', $player['id'])->count();
        //$player['countLoseDuels'] = Duel::where('loser', $player['id'])->count();

        return $players->toJson();
    }

    public function show($id): string
    {
        $player = Player::with('country', 'tournaments', 'classCharacter')->findOrFail($id);
        $player['countWinDuels'] = Duel::where('winner', $player['id'])->count();
        $player['countLoseDuels'] = Duel::where('loser', $player['id'])->count();

        return $player->toJson();
    }

    public function getHello(): string
    {
        return 'hello';
    }
}
