<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSliderHome;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $model;
    private $view = 'admin.home';

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

        return view("{$this->view}.home-1", compact('sliders'));
    }
}
