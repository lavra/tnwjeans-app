<?php

namespace App\Repositories;

use App\Models\SocialShare as Model;
use App\Interfaces\SocialShareInterface;

class SocialShareRepository implements SocialShareInterface
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create($input)
    {
        return $this->model->create($input);
    }
}