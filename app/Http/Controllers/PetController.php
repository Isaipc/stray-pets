<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Breed;
use App\Models\Age;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('created_at', 'DESC')->get();
        $count_pets = $pets->count();
        return view('pets.index', ["pets" => $pets, 'count_pets' => $count_pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pets.create', ["breeds" => Breed::all(), "ages" => Age::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required'
        // ]);
        // dd($request);
        $pet = new Pet;
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->sex = $request->sex;
        $pet->save();
        return redirect('/pets')->with('success', 'Mascota creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', ["breeds" => Breed::all(), "ages" => Age::all(), "pet" => $pet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->sex = $request->sex;
        $pet->save();
        return redirect('/pets')->with('success', 'Mascota actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect('/pets')->with('success', 'Mascota eliminada correctamente.');
    }
}
