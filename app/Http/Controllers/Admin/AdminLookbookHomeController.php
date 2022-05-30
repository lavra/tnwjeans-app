<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminLookbookHome;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminLookbookHomeController extends Controller
{

    private $model;

    private $view = 'admin.lookbook';

    public function __construct(AdminLookbookHome $model)
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
        $lookbooks = $this->model->orderBy('order')->get();

        return view("$this->view.index",  compact('lookbooks')); 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();        

        if ($request->photo) {
            $ext = $request->photo->extension();
            $name = substr($request->photo->getClientOriginalName(), 0, 4);
            $str = str_replace(".", "", $name);
            //$next_id = $this->model->latest()->first()->id + 1;
            $image = Str::slug($str). '.'. $ext;
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
