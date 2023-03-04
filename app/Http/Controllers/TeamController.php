<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->query('search');


        $query = Team::orderBy('short_name', 'ASC');

        if ($search) $query->where('short_name', 'LIKE', "%$search%");

        $teams = $query->get();


        return view('teams.index', compact('teams', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $team = new Team();
        return view('teams.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|unique:teams',
            'short_name' => 'required|string|unique:teams',
            'city' => 'required|string',
            'logo' => 'nullable|url',
            'serie' => 'required',
            'points' => 'required|numeric|min:-50|max:125',
            'goal_difference' => 'required|numeric|min:-100|max:100',
        ], [
            'short_name.unique' => "Il nome $request->short_name è già presente",
            'short_name.required' => 'Il campo nome squadra è obbligatorio',
            'name.required' => 'Il campo nome società è obbligatorio',
            'city.required' => 'Il campo città è obbligatorio',
            'points.min' => 'Il minimo per i punti è :min'
        ]);

        $data = $request->all();



        $team = new Team();

        /*     
        # Opzione 1 
        $team->name = $data['name'];
        $team->short_name = $data['short_name'];
        $team->city = $data['city'];
        $team->logo = $data['logo'];
        $team->description = $data['description'];
        $team->serie = $data['serie'];
        $team->points = $data['points'];
        $team->goal_difference = $data['goal_difference'];
       
        $team->save();
        */

        #Opzione 2
        $team->fill($data);

        $team->save();


        // #Opzione 3
        // $team = new Team($data);

        // # Opzione 4

        // $team = Team::create($data);






        return to_route('teams.show', $team->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $team = Team::withTrashed()->findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $team = Team::withTrashed()->findOrFail($id);

        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string', Rule::unique('teams')->ignore($team->id)],
            'short_name' => ['required', 'string', Rule::unique('teams')->ignore($team->id)],
            'city' => 'required|string',
            'logo' => 'nullable|url',
            'serie' => 'required',
            'points' => 'required|numeric|min:-50|max:125',
            'goal_difference' => 'required|numeric|min:-100|max:100',
        ], [
            'short_name.unique' => "Il nome $request->short_name è già presente",
            'short_name.required' => 'Il campo nome squadra è obbligatorio',
            'name.required' => 'Il campo nome società è obbligatorio',
            'city.required' => 'Il campo città è obbligatorio',
            'points.min' => 'Il minimo per i punti è :min'
        ]);


        $team->update($data);

        return to_route('teams.show', $team->id)
            ->with('type', 'success')
            ->with('message', 'Modifica effettuata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return to_route('teams.index')
            ->with('message', "La squadra $team->short_name è stata eliminata con successo")
            ->with('type', 'success');
    }



    /**
     * Display a listing of the trashed resource.
     */
    public function trash()
    {

        $teams = Team::onlyTrashed()->get();

        return view('teams.trash.index', compact('teams'));
    }

    /**
     * Restores a single resource from trash to active records.
     */
    public function restore(int $id)
    {
        $team = Team::onlyTrashed()->findOrFail($id);

        $team->restore();

        return to_route('teams.index')->with('message', "La squadra $team->short_name è stata ripristinata.")->with('type', 'success');
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function drop(int $id)
    {
        $team = Team::onlyTrashed()->findOrFail($id);
        $team->forceDelete();

        return to_route('teams.trash.index')
            ->with('message', "La squadra $team->short_name è stata eliminata definitivamente")
            ->with('type', 'success');
    }

    public function dropAll()
    {

        $num_teams = Team::onlyTrashed()->count();


        Team::onlyTrashed()->forceDelete();


        return to_route('teams.trash.index')
            ->with('message', "$num_teams squadre eliminate con successo")
            ->with('type', 'success');
    }
}
