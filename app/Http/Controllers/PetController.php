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
        return view(
            'pets.index',
            [
                "pets" => $pets,
                "breeds" => Breed::all(),
                "ages" => Age::all(),
                "request" => new Pet
            ]
        );
    }


    public function search(Request $request)
    {
        $pets = Pet::all();

        if (!is_null($request->name)) {
            // dd($pets);
            $name = "%" . $request->name . "%";
            $pets = Pet::where('name', 'like', $name)->get();
        }
        if (!is_null($request->age)) {
            $pets = $pets->where('age', $request->age);
        }
        if (!is_null($request->breed)) {
            $pets = $pets->where('breed', $request->breed);
        }
        if (!is_null($request->sex)) {
            $pets = $pets->where('sex', $request->sex);
        }


        return view(
            'pets.index',
            [
                "pets" => $pets,
                "breeds" => Breed::all(),
                "ages" => Age::all(),
                "request" => $request
            ]
        );
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
        return redirect('/pets')->with('success', 'Se ha guardado la mascota: ' . $pet->name);
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
        return redirect('/pets')->with('success', 'Se ha actualizado la mascota: ' . $pet->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $name = $pet->name;
        $pet->delete();
        return redirect('/pets')->with('success', 'Se ha eliminado la mascota: ' . $name);
    }
}
