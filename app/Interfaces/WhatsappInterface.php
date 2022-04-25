<?php

namespace App\Interfaces;


interface WhatsappInterface
{
    /**
     * Interface model Whatsapp
     *
     * @return \App\Repositories\WhatsappRepository
     */
    public function create($input);

}