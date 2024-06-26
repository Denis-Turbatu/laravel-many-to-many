<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaProgetti = Project::all();
        return view('admin.projects.index', compact('listaProgetti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types= Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // ottengo i data dalla request
        $data = $request->all();

        // creo una nuova istanza
        $project = new Project();

        // uso fill() per poter inserire i dati contenuti in $data
        $project->fill($data);
        $project->slug = $project->title . "-" . rand(00000, 99999);

        // salvo i data nel DB
        // dd($project);
        $project->save();

        //controllo presenza tecnologie
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        // reindirizzo l'utente
        return redirect()->route("admin.projects.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technologies);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    // FUNZIONE CUSTOM
    public function getBodySlug(Project $project): string
    {
        // imposto il simbolo da controllare
        $symbol = '-';
        // capisco in quale posizione trovo quel simbolo
        $position = strrpos($project->slug, $symbol);
        // dall'intero slug rimuovo la parte del titolo rimanendo con '-#####'
        if ($position !== false) {
            return substr($project->slug, $position + 1);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $slugBody = $this->getBodySlug($project);
        $project->slug = $request->title . '-' . $slugBody;
        $data['slug'] = $project->slug;
        $project->update($data);
        $project->technologies()->sync($request->technologies);

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
