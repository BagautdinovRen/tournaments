<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();

        return $tournaments->toJson();
    }

    public function show($id)
    {
        $tournament = Tournament::with('players')->findOrFail($id);

        return $tournament->toJson();
    }
}
