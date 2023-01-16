<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Leader;

class ProjectController extends Controller
{
    //menampilkan daftar project
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(5);
        return view('projects.index', compact('projects'));
    }
    //untuk menampilkan form  project baru
    public function create()
    {
        $leaders = Leader::all();
        return view('projects.create', compact('leaders'));
    }
    //menambahkan project baru
    public function store(Request $request)
    {
        $request->validate([
            'projectname' => 'required',
            'client' => 'required',
            'leader_id' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'progress' => 'required'
        ]);
        Project::create($request->post());
        return redirect()->route('projects.index')->with('success', 'Project berhasil dibuat');
    }
    //menampilkan project secara spesifik
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
    //menampilkan form untuk mengedit project
    public function edit(Project $project)
    {
        $leaders = Leader::all();
        return view('projects.edit', compact('project', 'leaders'));
    }
    //fungsi untuk mengupdate project
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'projectname' => 'required',
            'client' => 'required',
            'leader_id' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'progress' => 'required'
        ]);
        $project->fill($request->post())->save();
        return redirect()->route('projects.index')->with('success', 'Project berhasil diupdate');
    }
    //menghapus project tertentu
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus');
    }
}
