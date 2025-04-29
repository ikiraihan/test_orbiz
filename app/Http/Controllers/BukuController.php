<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class BukuController extends Controller
{
    public function home(){
        $buku = Buku::all();
        $response = Http::get('https://www.googleapis.com/books/v1/volumes?q=programming');

        $googles = $response->json();
        $googles = $googles['items'];
        $data = collect();
        $count = 0;
        foreach($googles as $google){
            $data->push([
                'thumbnail' => $google['volumeInfo']['imageLinks']['thumbnail'],
                'title' => $google['volumeInfo']['title'],
                'deskripsi' => $google['searchInfo']['textSnippet'],
                'infolink' => $google['volumeInfo']['infoLink'],
            ]);
            $count++;
        }
        
        return view('buku.home', [
            'buku' => $buku,
            'google' => $data,
        ]);
    }

    public function index(){
        $buku = Buku::all();
        return view('buku.index', [
            'buku' => $buku,
        ]);
    }

    public function indexCreate()
    {
        return view('/buku/create');
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $request->validate([
                'title'  => 'required|max:100',
                'author'  => 'required|max:100',
                'genre'  => 'required|max:50',
                'vote_count'  => 'nullable',
            ]);

            Buku::create([
                'title'  => $request->title ?? null,
                'author'  => $request->author ?? null,
                'genre'  => $request->genre ?? null,
                'vote_count'  => $request->vote_count ?? 0,
            ]);

            $request->session()->flash('success','Kota Baru Berhasil ditambahkan!');

            DB::commit();

            return redirect('/buku')->with('error', 'Berhasil Membuat Data Buku!');
        } catch (\Exception $e) {
            DB::rollback(); 
            return back()->with('error', 'Gagal Membuat Data Buku!');
        }
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
		
        return back()->with('error', 'Gagal Membuat Data Buku!');
        
    }

    public function vote($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->vote_count = $buku->vote_count + 1;
        $buku->save();

        return response()->json([
            'vote_count' => $buku->vote_count
        ]);
    }
}
