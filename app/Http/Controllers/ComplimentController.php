<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComplimentResource;
use App\Models\Compliment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin) {
            return ComplimentResource::collection(
                Compliment::orderBy('created_at', 'desc')
                    ->paginate()
            );
        }

        return ComplimentResource::collection(
            Compliment::where('receiver_user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required', 'max:255'],
            'receiver_user_id' => ['required', 'exists:users,id'],
            'tags' => ['array', 'exists:tags,id'],
        ]);

        $compliment = Compliment::create([
            'message' => $request->message,
            'receiver_user_id' => $request->receiver_user_id,
            'sender_user_id' => Auth::user()->id,
        ]);

        $compliment->tags()->attach($request->tags);

        return new ComplimentResource($compliment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
