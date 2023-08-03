<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{

    public function index()
    {
        $characterModel = new Character();
        $characters = $characterModel->getAllCharacters();
        $speciesList = $this->getSpeciesList($characters);
        return view('characters.index', compact('characters', 'speciesList'));
    }

    private function getSpeciesList($characters)
    {
        $speciesList = array_unique(array_column($characters, 'species'));
        return array_values($speciesList);
    }

    public function show($id)
    {
        $characterModel = new Character();
        $character = $characterModel->getCharacterById($id);
        return view('characters.show', compact('character'));
    }

    public function search(Request $request)
    {
        $name = $request->input('name');
        $characterModel = new Character();
        $characters = $characterModel->getCharactersByName($name);
        return view('characters.index', compact('characters'));
    }

    public function filter(Request $request)
    {
        $species = $request->input('species');
        $characterModel = new Character();
        $characters = $characterModel->getCharactersBySpecies($species);
        return view('characters.index', compact('characters'));
    }
}
