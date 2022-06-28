<?php

namespace App\Http\Controllers;

use App\Models\Borrowings;
use App\Http\Requests\StoreBorrowingsRequest;
use App\Http\Requests\UpdateBorrowingsRequest;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Students;
use Illuminate\Http\Request;

class BorrowingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('borrowings.index', [
            'title' => 'Borrowings',
            'borrowings' => Borrowings::where('status', 'borrowed')->get()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrowings.create', [
            'title' => 'Borrowings',
            'borrowings' => Borrowings::all(),
            'students' => Students::all(),
            'books' => Books::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowingsRequest $request)
    {
        $validateData = $request->validate([
            'students_id' => 'required|exists:students,id',
            'books_id' => 'required|exists:books,id',
            'status' => 'required',
            'admins_id' => 'required|exists:admins,id',
        ]);
        
        Borrowings::create($validateData);

        return redirect('/borrowings')->with('success', 'New Borrowing has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrowings  $borrowings
     * @return \Illuminate\Http\Response
     */
    public function show(Borrowings $borrowings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrowings  $borrowings
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrowings $borrowings, $borrowing)
    {
        $borrowingFind = Borrowings::find($borrowing);
        return view('borrowings.edit',compact(['borrowingFind']),[
            'title' => 'Borrowings',
            'admins_id' => 'required|exists:admins,id'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowingsRequest  $request
     * @param  \App\Models\Borrowings  $borrowings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowingsRequest $request, Borrowings $borrowings, $borrowing)
    {
        $borrowingFind = Borrowings::find($borrowing);

        $validateData = $request->validate([
            'status' => 'required'
        ]);
        
        $borrowingFind->update($validateData);

        return redirect('/borrowings')->with('successEdit', 'New book has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrowings  $borrowings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrowings $borrowings, Request $request)
    {
        // Borrowings::destroy($request->id);

        // return redirect('/borrowings')->with('successDelete', 'Borrowing has been deleted!');
    }
}
