<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadSlider;
use App\Models\AdminSliderHome;
use Illuminate\Support\Facades\Storage;

class AdminSliderHomeController extends Controller
{
    private $model;

    public function __construct(AdminSliderHome $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->model->orderBy('order')->get();

        return view('admin.slider-1.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider-1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UploadSlider $request
     * @return void
     */      
    public function store(UploadSlider $request)
    {
        $data = $request->all();        

        $data['style'] = 1;        

        if ($request->image) {
            $image = time().'.'.$request->image->extension();
            $data['image'] = $request->image->storeAs('img/slider', $image);
        }

        $data['active'] = isset($data['active']) ? 1 : 0;

        $this->model->create($data);

        return redirect()->route('admin.slider1');

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
        if (!$slider = $this->model->find($id))
            return redirect()->route('admin.slider1');

        return view('admin.slider-1.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UploadSlider $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadSlider $request, $id)
    {
        if (!$slider = $this->model->find($id))
            return redirect()->route('admin.slider1');

        $data = $request->all(); 
        $data['style'] = 1;   
        $data['active'] = isset($data['active']) ? 1 : 0; 

        if ($request->image) {

            $image = time().'.'.$request->image->extension();

            if ($slider->image && Storage::exists($slider->image)) {
                Storage::delete($slider->image);
            }

            $data['image'] = $request->image->storeAs('img/slider', $image);
        }

        $slider->update($data);

        return redirect()->route('admin.slider1');
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->model->find($id);

        if (!$slider)
            return redirect()->route('admin.slider1');

        if ($slider->image && Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.slider1');
    }
}
