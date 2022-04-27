<?php

namespace App\Http\Controllers\Admin;

use App\Models\Thana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;

class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['thanas'] = Thana::with('district')->latest()->get();
        return view('admin.site-basic-info.thana-list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['districts'] = District::orderBy('district_name')->get();
        return view('admin.site-basic-info.thana-create-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'thana_name' => 'required|unique:thanas,thana_name',
            'district_id' => 'required'
        ]);
        Thana::create([
            'thana_name' => $request->thana_name,
            'district_id' => $request->district_id,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Successfully Saved', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['districts'] = District::orderBy('district_name')->get();
        $data['thana'] = Thana::findOrFail($id);
        return view('admin.site-basic-info.thana-create-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thana = Thana::findOrFail($id);
        $thana->update([
            'thana_name' => $request->thana_name,
            'district_id' => $request->district_id,
            'status' => $request->filled('status'),
        ]);
        notify()->success('Successfully Updated', 'Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();
        notify()->success('Successfully Deleted', 'Delete');
        return back();
    }
}
