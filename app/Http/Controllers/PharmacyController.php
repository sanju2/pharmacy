<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Requests\PharmacyUpdateRequest;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmaci = Pharmacy::get();
        return view('pharmacy.index', compact('pharmaci'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacyStoreRequest $request)
    {
        $path = $request->image->store('public/pharmacy');
        Pharmacy::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $path,
        ]);
        return redirect()->route('pharmacy.index')->with('message', 'Medicine Added!');
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
        $pharmacy = Pharmacy::find($id);
        return view('pharmacy.edit', compact('pharmacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacyUpdateRequest $request, $id)
    {
        $pharmacy = Pharmacy::find($id);
        if ($request->has('image')) {
            $path = $request->image->store('public/pharmacy');
        } else {
            $path = $pharmacy->image;
        }
        $pharmacy = new Pharmacy;
        $pharmacy->name = $request->name;
        $pharmacy->description = $request->description;
        $pharmacy->price = $request->price;
        $pharmacy->category = $request->category;
        $pharmacy->image = $path;
        $pharmacy->save();
        return redirect()->route('pharmacy.index')->with('message', 'Medicine Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
