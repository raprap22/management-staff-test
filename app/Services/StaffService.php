<?php

namespace App\Services;

use App\Http\Requests\Staff\{StoreRequest, UpdateRequest};
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;

/**
 * Class StaffService.
 */
class StaffService
{
    public static function store(StoreRequest $request): Staff
    {
        $staff = Staff::create($request->safe()->except('resume'));

        $filename_resume = $request->resume->hashName();
        $request->resume->storeAs('public/staff/resume', $filename_resume);

        $staff->resume = $filename_resume;

        $staff->save();

        return $staff;
    }

    public static function update(UpdateRequest $request, Staff $staff): Staff
    {
        if (!empty($request->resume)) {
            Storage::delete('public/staff/resume/'.$staff->resume);

            $filename_resume = $request->resume->hashName();
            $request->resume->storeAs('public/staff/resume', $filename_resume);

            $staff->resume = $filename_resume;
        }

        $staff->fill($request->safe()->except('resume'));

        $staff->save();

        return $staff;
    }

    public static function destroy(Staff $staff): bool
    {
        Storage::delete('public/staff/resume/' . $staff->resume);

        return $staff->delete();
    }
}
