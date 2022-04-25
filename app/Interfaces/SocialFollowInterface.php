<?php

namespace App\Interfaces;


interface SocialFollowInterface
{
    /**
     * Interface model SocialFollow
     *
     * @return \App\Repositories\SocialFollowRepository
     */
    public function create($input);

}