<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Pet as PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Validator};

class PetController extends _BaseController
{
    public function index()
    {
        return $this->handleResponse(
            PetResource::collection(Pet::all()),
            'Pets have been retrieved!',
        );
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'photo_url' => 'required',
        ]);
        if ($validator->fails()) return $this->handleError($validator->errors());
        /** @var User $user **/
        $user = Auth::user();
        return $this->handleResponse(new PetResource($user->pets()->create($input)), 'Pet created!');
    }

    public function show($id)
    {
        $pet = Pet::find($id);
        if (is_null($pet)) return $this->handleError('Pet not found!');
        return $this->handleResponse(new PetResource($pet), 'Pet retrieved.');
    }

    public function update(Request $request, Pet $pet)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'photo_url' => 'required',
        ]);

        if ($validator->fails()) return $this->handleError($validator->errors());

        $pet->name = $input['name'];
        $pet->photo_url = $input['photo_url'];
        $pet->user_id = Auth::id();
        $pet->save();

        return $this->handleResponse(new PetResource($pet), 'Pet successfully updated!');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return $this->handleResponse([], 'Pet deleted!');
    }
}
