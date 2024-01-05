<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('staff.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required|unique:categories',
                'name' => "required",
            ]);
            Category::create([
                'id' => $request->id,
                'name' => $request->name,
            ]);
            return redirect('/staff/category')->with('success', 'Kategori Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/staff/category/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/category')->with('error', 'Kategori Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('staff.category.form', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $this->validate($request, [
                'id' => 'required|unique:categories',
                'name' => "required",
            ]);
            $category->update([
                'id' => $request->id,
                'name' => $request->name,
            ]);
            return redirect('/staff/category')->with('success', 'Kategori Berhasil Diubah');
        } catch (ValidationException $e) {
            // If validation fails, return back to the form with the validation errors
            return redirect('/staff/category/create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/category')->with('error', 'Kategori Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect('/staff/category')->with('success', 'Kategori Berhasil Dihapus');
        } catch (\Exception $e) {
            ddd($e);
            return redirect('/staff/category')->with('error', 'Kategori Gagal Dihapus');
        }
    }
}
