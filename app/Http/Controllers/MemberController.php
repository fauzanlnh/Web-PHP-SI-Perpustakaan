<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    private function generateId()
    {
        $currentDate = Carbon::now();
        $date = $currentDate->format('Y') . '' . $currentDate->format('m');

        $latestData = Member::select('id')->where('id', 'like', '%' . $date . '%')->orderBy('id', 'desc')->first();

        if ($latestData) {
            $latestId = explode('-', $latestData->id);
            $newIndex = $latestId[1] + 1;
        } else {
            $newIndex = 1;
        }
        $newIndex = str_pad($newIndex, 3, '0', STR_PAD_LEFT);
        $newId = $date . '-' . $newIndex;
        return $newId;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('staff.member.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.member.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => 'required|email|unique:members,email',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $photoPath = $request->file('photo')->store('public/img');
            Member::create([
                'id' => $this->generateId(),
                'name' => $request->name,
                'email' => $request->email,
                'photo' => $photoPath,
            ]);
            return redirect('/admin/member/')->with('success', 'Anggota Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/member/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/member/')->with('Anggota', 'Anggota Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('staff.member.form', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        try {
            $request->validate([
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'email' => ['required', 'email', Rule::unique('members', 'email')->ignore($member->id),],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->photo) {
                Storage::delete($member->photo);
                $photoPath = $request->file('photo')->store('public/img');
                $updateData['photo'] = $photoPath;
            }

            $member->update($updateData);

            return redirect('/admin/member/')->with('success', 'Anggota Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/member/' . $member->id . '/edit')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/member/')->with('Anggota', 'Anggota Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        try {
            $member->delete();
            return redirect('/admin/member')->with('success', 'Anggota Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/member')->with('error', 'Anggota Gagal Dihapus');
        }
    }
}
