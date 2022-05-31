<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminSliderHome;
use App\Models\AdminLookbookHome;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $modelSlider;
    private $modelLookbook;

    private $view = 'admin.home';

    public function __construct(AdminSliderHome $modelSlider, AdminLookbookHome $modelLookbook)
    {
        $this->modelSlider = $modelSlider;
        $this->modelLookbook = $modelLookbook;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->modelSlider->orderBy('order')->get();
        $lookbooks = $this->modelLookbook->orderBy('order')->get();

        return view("{$this->view}.home-1", compact('sliders', 'lookbooks'));
    }
}
