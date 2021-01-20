<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index(): string
    {
        $tournaments = Tournament::all();

        return $tournaments->toJson();
    }

    public function show($id): string
    {
        $tournament = Tournament::with('players')->findOrFail($id);

        return $tournament->toJson();
    }
}
