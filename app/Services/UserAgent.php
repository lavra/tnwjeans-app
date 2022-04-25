<?php
/**
 * Created by AV Design.
 * User: Anselmo Velame
 * Date: 09/02/20
 * Time: 14:33
 */

namespace App\Services;

use Jenssegers\Agent\Agent;


class UserAgent
{
    /**
     * @var Agent
     */
    private $agent;

    /**
     * UserAgent constructor.
     * @param Agent $agent
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * @return Agent
     */
    public function agent()
    {
        return $this->agent;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->agent->isMobile();
    }

    /**
     * @return bool
     */
    public function isTablet()
    {
        return $this->agent->isTablet();
    }

    /**
     * @return bool
     */
    public function isDesktop()
    {
        return $this->agent->isDesktop();
    }

}