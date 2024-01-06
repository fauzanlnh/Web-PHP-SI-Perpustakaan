<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('staff.author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Make a request to the API to get the list of countries
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody(), true);

        // Extract country names from the response
        $countryNames = array_map(function ($country) {
            return $country['name']['common'];
        }, $countries);
        sort($countryNames);
        return view('staff.author.form', ['countries' => $countryNames]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'birth_date' => "required",
                'country' => "required",

            ]);
            Author::create([
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'country' => $request->country,
            ]);
            return redirect('/admin/author')->with('success', 'Author Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/author/create')->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/author')->with('error', 'Author Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        // Make a request to the API to get the list of countries
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/all');
        $countries = json_decode($response->getBody(), true);

        // Extract country names from the response
        $countryNames = array_map(function ($country) {
            return $country['name']['common'];
        }, $countries);
        sort($countryNames);
        return view('staff.author.form', ['countries' => $countryNames, 'author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        try {
            $this->validate($request, [
                'name' => "required",
                'birth_date' => "required",
                'country' => "required",

            ]);
            $author->update([
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'country' => $request->country,
            ]);
            return redirect('/admin/author')->with('success', 'Author Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/admin/author/' . $author->id . '/edit')->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/author')->with('error', 'Author Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        try {
            $author->delete();
            return redirect('/admin/author')->with('success', 'Author Berhasil Diubah');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/admin/author')->with('error', 'Author Gagal Diubah');
        }
    }
}
