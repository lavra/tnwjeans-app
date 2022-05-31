<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\AdminLookbookHome;
use App\Http\Requests\UploadImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



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
     * @param  App\Http\Requests\UploadImage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadImage $request)
    {
        $data = $request->all();        

        if ($request->photo) {
            $ext = $request->photo->extension();
            $name = substr($request->photo->getClientOriginalName(), 0, -4);
            $str = str_replace(".", "", $name);
            $next_id = isset($this->model->latest()->first()->id) ? $this->model->latest()->first()->id + 1 : 1;
            $image = Str::slug($str. '-' .$next_id). '.'. $ext;
            $data['image'] = $request->photo->storeAs('img/lookbook', $image);
        }

        $data['active'] = isset($data['active']) ? 1 : 0;

        $this->model->create($data);

        return redirect()->route('lookbook.index');
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
        if (!$lookbook = $this->model->find($id))
            return redirect()->route('lookbook.index');
            
        return view("$this->view.edit", compact('lookbook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UploadImage  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImage $request, $id)
    {
        if (!$lookbook = $this->model->find($id))
            return redirect()->route('lookbook.index');

        $data = $request->all(); 
        $data['style'] = 1;   
        $data['active'] = isset($data['active']) ? 1 : 0; 

        if ($request->photo) {
            $ext = $request->photo->extension();
            $name = substr($request->photo->getClientOriginalName(), 0, -4);
            $str = str_replace(".", "", $name);
            $image_id = $this->model->latest()->first()->id;
            $image = Str::slug($str. '-' .$image_id). '.'. $ext;          

            if ($lookbook->image && Storage::exists($lookbook->image)) {
                Storage::delete($lookbook->image);
            }

            $data['image'] = $request->photo->storeAs('img/lookbook', $image);
        }

        $lookbook->update($data);

        return redirect()->route('lookbook.index');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lookbook = $this->model->find($id);

        if (!$lookbook)
            return redirect()->route('lookbook.index');

        if ($lookbook->image && Storage::exists($lookbook->image)) {
            Storage::delete($lookbook->image);
        }

        $lookbook->delete();

        return redirect()->route('lookbook.index');   
     }
}
