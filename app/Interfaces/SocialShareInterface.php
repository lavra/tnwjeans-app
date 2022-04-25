<?php

namespace App\Interfaces;


interface SocialShareInterface
{
    /**
     * Interface model SocialShare
     *
     * @return \App\Repositories\SocialShareRepository
     */
    public function create($input);

}