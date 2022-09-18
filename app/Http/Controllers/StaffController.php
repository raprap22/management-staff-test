<?php

namespace App\Http\Controllers;

use App\Http\Requests\Staff\{StoreRequest, UpdateRequest};
use App\Models\Staff;
use App\Services\StaffService;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('staff-show');

        $staffs = Staff::all();

        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('staff-create');

        return view('staff.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        StaffService::store($request);

        Alert::success('Berhasil', 'Berhasil Menambah Data !');

        return redirect()->route('staff.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Staff $staff)
    {
        StaffService::update($request, $staff);

        Alert::success('Berhasil', 'Berhasil Mengubah Data !');

        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $this->authorize('staff-delete');

        StaffService::destroy($staff);

        Alert::success('Berhasil', 'Berhasil Menghapuskan Data !');

        return redirect()->route('staff.index');
    }
}
