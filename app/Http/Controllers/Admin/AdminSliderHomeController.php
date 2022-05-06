<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadSlider;
use App\Models\AdminSliderHome;
use Illuminate\Http\Request;

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
        dd($this->model->all());
        return view('admin.slider-1.index');
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

        $image = time().'.'.$request->image->extension();
        $data['image'] = $request->image->storeAs('img/slider', $image);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
