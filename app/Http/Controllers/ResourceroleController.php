<?php

namespace App\Http\Controllers;

use App\Resourcerole;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceroleRequest;

class ResourceroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  $resourceroles = Resourcerole::with('resource')
        //         ->paginate(Controller::C_PAGINATE_SIZE);
        // dd($resourceroles);
        if ($request->ajax())
        {
            $resourceroles = Resourcerole::with('resource', 'role')
                ->paginate(Controller::C_PAGINATE_SIZE);

            return $resourceroles;
        }

        return view('resourceroles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceroleRequest $request)
    {
        if ($request->ajax())
        {
            // Check for duplicate
            $newResourcerole = Resourcerole::createIfNotExists($request);

            $newResourcerole->load('resource')->get();
            $newResourcerole->load('role')->get();

            return [
                'status'       => is_null($newResourcerole) ? 1 : 0,
                'resourcerole' => $newResourcerole
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resourcerole  $resourcerole
     * @return \Illuminate\Http\Response
     */
    public function show(Resourcerole $resourcerole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resourcerole  $resourcerole
     * @return \Illuminate\Http\Response
     */
    public function edit(Resourcerole $resourcerole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resourcerole  $resourcerole
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceroleRequest $request, Resourcerole $resourcerole)
    {
        if ($request->ajax())
        {
            $resourcerole->update([
                'state'       => $request->state,
                'resource_id' => $request->resource_id,
                'role_id'     => $request->role_id,
            ]);

            $resourcerole->load('resource')->get();
            $resourcerole->load('role')->get();

            return [
                'status'       => 0,
                'resourcerole' => $resourcerole
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resourcerole  $resourcerole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resourcerole $resourcerole)
    {
        if ($request->ajax())
        {
            $resourcerole->delete();

            return [
                'status' => 0
            ];
        }
    }
}
