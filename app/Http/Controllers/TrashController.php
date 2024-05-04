<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashController extends Controller
{
    public function index()
    {
        $trash = Trash::all();
        return response()->json($trash);
    }

    public function trashByCity(Request $request, string $thiscity)
    {
        $trash = Trash::where('city', $thiscity)->get();
        return response()->json($trash);
    }
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
            'address' => 'required|string',
            'request_comment' => 'nullable|string',
            'city' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $photoPath = $request->file('photo')->store('public/storage');
        $confirmationPhotoPath = null;
        if ($request->hasFile('confirmation_photo')) {
            $confirmationPhotoPath = $request->file('confirmation_photo')->store('public/storage');
        }

        $trash = new Trash();
        $trash->user_id = Auth::id();
        $trash->photo_url = '/' . basename($photoPath);
        $trash->address = $request->address;
        $trash->city = $request->city;
        $trash->request_comment = $request->request_comment;
        $trash->confirmation_photo_url = $confirmationPhotoPath ? '/' . basename($confirmationPhotoPath) : null;
        $trash->price = $request->price;
        $trash->save();

        return response()->json(['message' => 'Trash created successfully', 'data' => $trash], 201);
    }

}
