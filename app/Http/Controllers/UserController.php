<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserSimplifiedResource;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryResult = User::paginate();

        $userIsAdmin = Auth::user()->is_admin;

        $shouldBeSimplified = $this->requestHasABooleanOrEmptyQueryStringName('simplified');

        if (!$userIsAdmin || $shouldBeSimplified) {
            return UserSimplifiedResource::collection($queryResult);
        }

        return UserResource::collection($queryResult);
    }

    private function requestHasABooleanOrEmptyQueryStringName($queryStringKey)
    {
        return request()->boolean($queryStringKey) || request()->query($queryStringKey) === null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validFields = $request->validated();
        $validFields = $request->safe()->only(['name', 'email', 'password']);

        Arr::set($validFields, "password", Hash::make($validFields['password']));

        $createdUser = User::create($validFields);

        return response()->json($createdUser, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
