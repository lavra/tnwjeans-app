<?php

namespace App\Repositories;

use App\Models\SocialNetwork as Model;
use App\Interfaces\SocialNetworkInterface;

class SocialNetworkRepository implements SocialNetworkInterface
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function setId($id)
    {
        return $this->model->find($id);
    }

    public function get()
    {
        return $this->model->get();
    }
}