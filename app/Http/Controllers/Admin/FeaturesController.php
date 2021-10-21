<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\Feature;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $features = Feature::latest()->paginate();
        return view('admin.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $feature = new Feature();
        return view('admin.features.create', compact('feature'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $latest_feature = new Feature();
        $validatedData = $this->validateRequest($request);

        try {
            $feature = Feature::create($validatedData);
            $latest_feature = $feature;

            return redirect('admin/features/' . $feature->id)->with('flash_message', 'Feature added!');
        } catch (\Throwable $th) {
            Feature::destroy($latest_feature->id);

            Log::error('Error! Unable to create car feature: ' . $th->getMessage());

            return redirect('admin/features')->with('flash_message_error', 'Error while creating car feature');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validateRequest($request);

        $feature = Feature::findOrFail($id);

        try {
            $feature->update($validatedData);
            return redirect('admin/features/' . $feature->id)->with('flash_message', 'Feature updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update car feature: ' . $th->getMessage());
            return redirect('admin/features')->with('flash_message_error', 'Error while updating car feature');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            Feature::destroy($id);
            return redirect('admin/features')->with('flash_message', 'Feature deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to delete car feature: ' . $th->getMessage());
            return redirect('admin/features')->with('flash_message_error', 'Error while deleting car feature');
        }
    }

    /**
     *  Validates Features Make Request Details
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return array
     */
    public function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:2',
            'type' => 'required',
        ]);
    }
}
