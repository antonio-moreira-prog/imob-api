<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        return $this->property->whereNull('deleted_at')->get();
    }

    public function store(Request $request)
{

    $property = new Property();

    $property->title = $request->title;
    $property->address = $request->address;
    $property->price = $request->price;
    $property->area = $request->area;
    $property->bedrooms = $request->bedrooms;
    $property->bathrooms = $request->bathrooms;
    $property->description = $request->description;
    $property->city = $request->city;
    $property->state = $request->state;
    $property->zip = $request->zip;
    // $property->image = $request->image;

    $property->user_id = auth()->id();

    $property->save();

    return $property;
}


    public function show(string $id)
    {
        return $this->property->findOrFail($id);
    }

    public function update(Request $request, $propertyId)
    {
        $property = $this->property->find($propertyId);
        $property->update($request->all());
        return $property;
    }

    public function destroy(string $id)
    {

    }
}
