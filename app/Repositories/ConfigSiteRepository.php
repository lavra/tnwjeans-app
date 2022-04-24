<?php

namespace App\Repositories;

use App\Models\ConfigSite as Model;
use App\Interfaces\ConfigSiteInterface;

class ConfigSiteRepository implements ConfigSiteInterface
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function setId($id)
    {
        return $this->model->find($id);
    }
}