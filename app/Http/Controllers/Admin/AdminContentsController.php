<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminContent;
use Illuminate\Http\Request;

class AdminContentsController extends Controller
{
    private $model;
    private $view = 'admin.content';

    public function __construct(AdminContent $model)
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
        $data = $this->model->get();

        return view("$this->view.index", compact('data'));
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
        $data = $request->except('_token');
        $redirect = redirect()->route('content.index');

        if (!$dataForm = $this->model->find($id))
            return $redirect;

        $dataForm->update($data);

        return $redirect;
    }
}
