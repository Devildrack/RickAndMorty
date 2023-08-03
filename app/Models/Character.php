<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Character extends Model
{
    public function getAllCharacters()
    {
        return Http::get('https://rickandmortyapi.com/api/character')->json();
    }

    public function getCharacterById($id)
    {
        return Http::get("https://rickandmortyapi.com/api/character/{$id}")->json();
    }

    public function getCharactersByName($name)
    {
        return Http::get("https://rickandmortyapi.com/api/character/?name={$name}")->json();
    }

    public function getCharactersBySpecies($species)
    {
        return Http::get("https://rickandmortyapi.com/api/character/?species={$species}")->json();
    }
}
