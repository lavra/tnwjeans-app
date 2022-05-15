<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConfigSite;
use Illuminate\Http\Request;

class ConfigWebsiteController extends Controller
{
    private $model;

    public function __construct(ConfigSite $model)
    {
        $this->model = $model;
    }


    /**
     * Define a cor do site.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function color(Request $request)
    {
        $config = $this->model->find(1);
        $data = $request->all();

        $config->update($data);
    }

    /**
     * Define a cor do corpo (light/dark)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dark_switch(Request $request)
    {
        $config = $this->model->find(1);
        $data = $request->all();

        $config->update($data);
    }

    /**
     * Define estilo do layout Boxe/Full
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function boxed_switch(Request $request)
    {
        $config = $this->model->find(1);
        $data = $request->all();

        $config->update($data);
    }

    /**
     * Define separação do site
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function separator_switch(Request $request)
    {
        $config = $this->model->find(1);
        $data = $request->all();

        $config->update($data);
    }    


}
