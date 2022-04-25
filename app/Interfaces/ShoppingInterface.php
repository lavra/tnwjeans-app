<?php

namespace App\Interfaces;


interface ShoppingInterface
{
    /**
     * Interface model Shopping
     *
     * @return \App\Repositories\ShoppingRepository
     */
    public function create($input);

}