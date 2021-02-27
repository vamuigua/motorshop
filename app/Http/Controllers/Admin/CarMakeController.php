<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\CarMake;
use Illuminate\Http\Request;

class CarMakeController extends Controller
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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $carmake = CarMake::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $carmake = CarMake::latest()->paginate($perPage);
        }

        return view('admin.car-make.index', compact('carmake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.car-make.create');
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

        $requestData = $request->all();

        CarMake::create($requestData);

        return redirect('admin/car-make')->with('flash_message', 'CarMake added!');
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
        $carmake = CarMake::findOrFail($id);

        return view('admin.car-make.show', compact('carmake'));
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
        $carmake = CarMake::findOrFail($id);

        return view('admin.car-make.edit', compact('carmake'));
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

        $requestData = $request->all();

        $carmake = CarMake::findOrFail($id);
        $carmake->update($requestData);

        return redirect('admin/car-make')->with('flash_message', 'CarMake updated!');
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
        CarMake::destroy($id);

        return redirect('admin/car-make')->with('flash_message', 'CarMake deleted!');
    }
}
