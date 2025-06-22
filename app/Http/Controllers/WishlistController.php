<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Auth::user()->wishlist()->with('user')->get();
        return view('wishlist.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $item = Auth::user()->wishlist()->where('items.id', $id)->firstOrFail();
        return view('wishlist.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Auth::user()->wishlist()->detach($id);
        return redirect()->route('wishlist.index')->with('success', 'Item berhasil dihapus dari wishlist.');
    }

    public function toggle(Item $item)
{
    $user = Auth::user();

        if ($user->wishlist()->where('items.id', $item->id)->exists()) {
            $user->wishlist()->detach($item->id);
        } else {
            $user->wishlist()->attach($item->id);
        }

        return back()->with('success', 'Wishlist diperbarui.');
}
}
