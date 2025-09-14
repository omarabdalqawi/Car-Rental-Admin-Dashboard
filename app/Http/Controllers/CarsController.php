<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
class CarsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:car-list|car-create|car-edit|car-delete', ['only' => ['index','show']]);
         $this->middleware('permission:car-create', ['only' => ['create','store']]);
         $this->middleware('permission:car-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:car-delete', ['only' => ['destroy']]);
    }


    public function index():View
    {

        $data=Car::latest()->paginate(5);
        return view('cars.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create():View
    {
       return view("cars.create");
    }





    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'namecar'=>'required|max:100|',
            'colorcar'=>'required',
            'typecar'=>'required|max:15|',
            'model'=>'numeric|required',
            'pottynumber'=>'numeric|required',
            'image'=>['required','mimes:jpg,jpeg,gif,svg','dimensions:min_width=100,min_height=100,max_height=1000,max_width=1000',
            'max:2048'],
        ]);

    $file_extension=$request->image->getClientOriginalExtension();
    $file_name= time() .'.'. $file_extension;
    $path ="images/cars";
   $folder= $request->image->move($path,$file_name);

    Car::create([
        'namecar'=>$request->namecar,
        'colorcar'=>$request->colorcar,
        'typecar'=>$request->typecar,
        'model'=>$request->model,
        'pottynumber'=>$request->pottynumber,
        'image'=>$file_name,

    ]);
     return redirect()->route('cars.index')->with('success','Car created successfully.');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car): View
    {
        return view('cars.edit',compact('car'));
    }


 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car): RedirectResponse
    {
        //  request()->validate([
        //     'namecar'=>'required|max:100|',
        //     'colorcar'= >'required',
        //     'typecar'=>'required|max:15|',
        // ]);

        $car->update($request->all());

        return redirect()->route('cars.index')
                        ->with('success','Car updated successfully');
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();

        return redirect()->route('cars.index')
                        ->with('success','Car deleted successfully');
    }



}
