<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(Request $request, string $id)
    {
         $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:500'],
            'image' => ['max:3000', 'image'],

         ]);   

         //dd($request->all());
         $hero = Hero::first();
         if($request->hasFile('image')){

                
                if($hero && File::exists(public_path($hero->image))){
                    File::delete(public_path($hero->image));
                }

                //dd('hello');
                $image = $request->file('image');
                $imageName = rand().$image->getClientOriginalName();
                $image->move(public_path('/uploads'), $imageName);

                $imagePath = "/uploads/".$imageName;

               // dd($imagePath);

         }

         Hero::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'btn_text'  => $request->btn_text,
                'btn_url'   => $request->btn_url,
                'image'   => isset($imagePath) ? $imagePath : $hero->image,


            ]

         );
           // dd('success');
           toastr()->success('Updated Successfully', 'Congrats');
           return redirect()->back();


    }*/

           public function update(Request $request, string $id)
{
    $request->validate([
        'title' => ['required', 'max:200'],
        'sub_title' => ['required', 'max:500'],
        'image' => ['nullable', 'image', 'max:3000'],
    ]);

    // Find hero by ID
    $hero = Hero::findOrFail($id);

    $imagePath = $hero->image; // keep old image by default

    // If new image uploaded
    if ($request->hasFile('image')) {

        // Delete old image if exists
        if ($hero->image && File::exists(public_path($hero->image))) {
            File::delete(public_path($hero->image));
        }

        // Upload new image
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        $imagePath = '/uploads/' . $imageName;
    }

    // Update hero
    $hero->update([
        'title'     => $request->title,
        'sub_title' => $request->sub_title,
        'btn_text'  => $request->btn_text,
        'btn_url'   => $request->btn_url,
        'image'     => $imagePath,
    ]);

    toastr()->success('Updated Successfully', 'Congrats');

    return redirect()->back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
