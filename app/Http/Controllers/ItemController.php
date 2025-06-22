<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Item::where('user_id', Auth::id());

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan status
        if ($request->status === 'tersedia') {
            $query->where('is_sold', 0);
        } elseif ($request->status === 'terjual') {
            $query->where('is_sold', 1);
        }

        // Urutkan berdasarkan harga atau waktu
        switch ($request->sort) {
            case 'termurah':
                $query->orderBy('price', 'asc');
                break;
            case 'termahal':
                $query->orderBy('price', 'desc');
                break;
            case 'terbaru':
                $query->orderBy('created_at', 'desc');
                break;
            case 'semua';
        }

        $items = $query->paginate(12); // Sesuaikan pagination

        return view('items.index', compact('items'));
    }



    public function dashboard(Request $request)
    {
        $query = Item::where('user_id', Auth::id());

        // Search
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        $items = $query->paginate(12);

        return view('dashboard', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username'    => 'required|string|max:255',
            'no_telp'     => 'required|string|max:255',
            'instagram'   => 'required|string|max:255',
            'notes'       => 'nullable|string',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category'    => 'required|string|max:100',
            'price'       => 'required|numeric',
            'is_sold'     => 'required|boolean',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }

        // Tambahkan user_id (dari user yang login)
        $validated['user_id'] = Auth::id();


        // Simpan ke database
        $items = Item::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        return view('items.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        // Pastikan hanya pemilik item yang bisa mengedit
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Cek kepemilikan
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        // Validasi input
        $validated = $request->validate([
            'username'    => 'required|string|max:255',
            'no_telp'     => 'required|string|max:255',
            'instagram'   => 'required|string|max:255',
            'notes'       => 'nullable|string',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category'    => 'required|string|max:100',
            'price'       => 'required|numeric',
            'is_sold'     => 'required|boolean',
        ]);

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Update item dengan data baru
        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Cek apakah item milik user yang login
        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        // Hapus gambar jika ada
        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        // Hapus item
        $item->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Produk berhasil dihapus!');
    }
}
