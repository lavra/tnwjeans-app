<?php

namespace App\Interfaces;


interface SocialNetworkInterface
{
    /**
     * Interface model SocialNetwork
     *
     * @return \App\Repositories\SocialNetworkRepository
     */
    public function setId($id);
    public function get();

}