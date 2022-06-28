<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoriesController extends Controller
{


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $categories)
    {
        return view('categories.index', [
            'title' => 'Categories',
            'categories' => Categories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', [
            'title' => 'Categories',
            'categories' => Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        $this->authorize('admin');

        $validateData = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        
        Categories::create($validateData);

        return redirect('/categories')->with('success', 'New Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories, $category)
    {

        $categoryFind = Categories::find($category);

        return view('categories.edit',compact(['categoryFind']), [
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories, $category)
    {
        $categoryFind = Categories::find($category);

        $validateData = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        // $validatedData['categories_id'] = $categories->id;
        
        $categoryFind->update($validateData);

        // Categories::where('id', $categories->id)
        //             ->update($validateData);

        return redirect('/categories')->with('successEdit', 'New Category has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories, Request $request)
    {
        Categories::destroy($request->id);

        return redirect('/categories')->with('successDelete', 'Category has been deleted!');
    }
}
