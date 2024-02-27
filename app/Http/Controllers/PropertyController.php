<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    protected $property;
    public function __construct(Property $property)
    {
        $this->property = $property;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $properties = $this->property->whereNull('deleted_at')->get();
        // return $properties;
        return $this->property->whereNull('deleted_at')->get();
    }



    // public function store(Request $request)
    // {
    //     // return $this->property->create($request->all());
    //     if ($request->hasFile('image')) {

    //         $imagePath = $request->file('image')->store('images');
    //     } else {
    //         $imagePath = 'images/default_image.jpg';
    //     }
    //     $property = new Property();
    //     $property->user_id = Auth::id();
    //     $property->image = $imagePath;
    //     $property->fill($request->all());
    //     $property->save();
    //     return $property;
    // }
    public function store(Request $request)
    {
        $user = Auth::user();
        $property = new Property();
        $property->title = $request->title;
        $property->address = $request->address;

        $property->user_id = $user->id;
        dd($property->user_id);
        $property->save();
        return $property;
    // $user = auth()->user();

    // $property = new Property($request->all());
    // $property->user_id = $user->id;
    // $property->save();

    // return response()->json($property, 201);
    // }

    }
    public function show(string $id)
    {
        // dd($this->property->findOrFail($id));
        return $this->property->findOrFail($id);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $propertyId)
{


    // $validatedData = $request->validate([
    //     'title' => 'string|max:255',
    //     'address' => 'string|max:255',
    //     'price' => 'numeric',
    //     'area' => 'numeric',
    //     'bedrooms' => 'integer',
    //     'bathrooms' => 'integer',
    //     'description' => 'nullable|string',
    //     'city' => 'string|max:255',
    //     'state' => 'string|max:255',
    //     'zip' => 'string|max:10',
    //     'image' => 'nullable|string',
    // ]);

    // $property = Property::findOrFail($propertyId);

    // $property->update($validatedData);

    // return $property;

    $property = $this->property->find($propertyId);
    $property->update($request->all());
    return $property;


}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
