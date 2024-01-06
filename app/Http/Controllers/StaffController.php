<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{
    private function generateId()
    {
        $latestData = Staff::select('id')->orderBy('id', 'desc')->first();

        if ($latestData) {
            $latestId = explode('-', $latestData->id);
            $newIndex = $latestId[1] + 1;
        } else {
            $newIndex = 1;
        }
        $newIndex = str_pad($newIndex, 3, '0', STR_PAD_LEFT);
        $newId = 'PGW-' . $newIndex;
        return $newId;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.staff.index', ['staff' => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.staff.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => 'required|email|unique:staff,email',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $newId = $this->generateId();
            $photoPath = $request->file('photo')->store('public/img');
            Staff::create([
                'id' => $newId,
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $photoPath,
            ]);

            User::create([
                'username' => $newId,
                'password' => Hash::make($newId),
                'role' => 'admin'
            ]);
            return redirect('/admin/staff/')->with('success', 'Staff Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/staff/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/staff/')->with('Staff', 'Staff Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staff.staff.form', ['staff' => $staff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        try {
            $request->validate([
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => ['required', 'email', Rule::unique('staff', 'email')->ignore($staff->id),],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->photo) {
                Storage::delete($staff->photo);
                $photoPath = $request->file('photo')->store('public/img');
                $updateData['photo'] = $photoPath;
            }

            $staff->update($updateData);

            return redirect('/admin/staff/')->with('success', 'Staff Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/staff/' . $staff->id . '/edit')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/staff/')->with('Staff', 'Staff Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            $user = User::where('username', '=', $staff->id)->first();
            if ($user) {
                $user->delete();
            }
            Storage::delete($staff->photo);
            $staff->delete();
            return redirect('/admin/staff')->with('success', 'Staff Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/staff')->with('error', 'Staff Gagal Dihapus');
        }
    }
}
