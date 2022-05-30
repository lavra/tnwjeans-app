<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImage;
use App\Models\AdminSliderHome;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminSliderHomeController extends Controller
{
    private $model;

    private $view = 'admin.slider-home-1';

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

        return view("$this->view.index",  compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("$this->view.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UploadImage $request
     * @return void
     */      
    public function store(UploadImage $request)
    {
        $data = $request->all();  
        

        $data['style'] = 1;        

        if ($request->photo) {
            $ext = $request->photo->extension();
            $name = substr($request->photo->getClientOriginalName(), 0, -4);
            $str = str_replace(".", "", $name);
            $next_id = isset($this->model->latest()->first()->id) ? $this->model->latest()->first()->id + 1 : 1;
            $image = Str::slug($str. '-' .$next_id). '.'. $ext;
            $data['image'] = $request->photo->storeAs('img/slider', $image);
        }

        $data['active'] = isset($data['active']) ? 1 : 0;

        $this->model->create($data);

        return redirect()->route('slider1.index');

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
            return redirect()->route('slider1.index');
            
        return view("$this->view.edit", compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UploadImage $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImage $request, $id)
    {
        if (!$slider = $this->model->find($id))
            return redirect()->route('slider1.index');

        $data = $request->all(); 
        $data['style'] = 1;   
        $data['active'] = isset($data['active']) ? 1 : 0; 

        if ($request->photo) {
            $ext = $request->photo->extension();
            $name = substr($request->photo->getClientOriginalName(), 0, -4);
            $str = str_replace(".", "", $name);
            $image_id = $this->model->latest()->first()->id;
            $image = Str::slug($str. '-' .$image_id). '.'. $ext;          

            if ($slider->image && Storage::exists($slider->image)) {
                Storage::delete($slider->image);
            }

            $data['image'] = $request->photo->storeAs('img/slider', $image);
        }

        $slider->update($data);

        return redirect()->route('slider1.index');
       
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
            return redirect()->route('slider1.index');

        if ($slider->image && Storage::exists($slider->image)) {
            Storage::delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('slider1.index');
    }
}
