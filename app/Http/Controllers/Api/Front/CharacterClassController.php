<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Models\ClassCharacter;
use Illuminate\Http\Request;

class CharacterClassController extends Controller
{
    public function index(): string
    {
        $classes = ClassCharacter::all();

        return $classes->toJson();
    }
}
