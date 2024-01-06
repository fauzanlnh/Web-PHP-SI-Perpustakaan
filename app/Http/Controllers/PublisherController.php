<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('staff.publisher.index', ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.publisher.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'address' => "required",

            ]);
            Publisher::create([
                'name' => $request->name,
                'address' => $request->address,
            ]);
            return redirect('/admin/book/publisher')->with('success', 'Penerbit Berhasil Ditambahkan');

        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/book/publisher/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/book/publisher')->with('error', 'Penerbit Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        return view('staff.publisher.form', ['publisher' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'address' => "required",

            ]);
            $publisher->update([
                'name' => $request->name,
                'address' => $request->address,
            ]);
            return redirect('/admin/book/publisher')->with('success', 'Penerbit Berhasil Diubah');

        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/book/publisher/' . $publisher->id . '/edit')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/book/publisher')->with('error', 'Penerbit Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        try {
            $publisher->delete();
            return redirect('/admin/book/publisher')->with('success', 'Penerbit Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/book/publisher')->with('error', 'Penerbit Gagal Dihapus');
        }
    }
}
