<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;

class LeaderController extends Controller
{
    //menampilkan daftar leader
    public function index()
    {
        $leaders = Leader::orderBy('id', 'desc')->paginate(5);
        return view('leaders.index', compact('leaders'));
    }
    //untuk menampilkan form  leader baru
    public function create()
    {
        return view('leaders.create');
    }
    //menambahkan leader baru
    public function store(Request $request)
    {
        $request->validate([
            'leadername' => 'required',
            'email' => 'required',
            'photo' => 'required'
        ]);
        $file = $request->file('photo');
        $fileName = $file->getClientOriginalName();

        $file->move('img', $file->getClientOriginalName());
        $leader = new Leader;
        $leader->photo = $fileName;
        $leader->leadername = $request->input('leadername');
        $leader->email = $request->input('email');
        $leader->save();
        //Leader::create($request->post());
        return redirect()->route('leaders.index')->with('success', 'Leader berhasil dibuat');
    }
    //menampilkan leader secara spesifik
    public function show(Leader $leader)
    {
        return view('leaders.show', compact('leader'));
    }
    //menampilkan form untuk mengedit leader
    public function edit(leader $leader)
    {
        return view('leaders.edit', compact('leader'));
    }
    //fungsi untuk mengupdate leader
    public function update(Request $request, Leader $leader)
    {
        $request->validate([
            'leaderame' => 'required',
            'email' => 'required',
            'photo' => 'required'
        ]);
        $leader->leadername;
        $leader->email;
        if($request->photo){
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $photo->move(publicd_pat('img'), $filename);
        }
        $leader->update();
        /*
        $file = $request->file('photo');
        $fileName = $file->getClientOriginalName();

        $file->move('img', $file->getClientOriginalName());
        $leader = new Leader;
        $leader->photo = $fileName;
        $leader->leadername = $request->input('leadername');
        $leader->email = $request->input('email');
        $leader->save();
        $leader->update($request->post());
        return redirect()->route('leaders.index')->with('success', 'Leader berhasil diupasate');
        */
        //$leader->fill($request->post())->save();
        return redirect()->route('leaders.index')->with('success', 'Leader berhasil diupdate');
    }
    //menghapus leader tertentu
    public function destroy(Leader $leader)
    {
        $leader->delete();
        return redirect()->route('leaders.index')->with('success', 'Leader berhasil dihapus');
    }
}
