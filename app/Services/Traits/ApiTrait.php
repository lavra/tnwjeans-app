<?php
/**
 * Created AV Design.
 * User: Anselmo Velame
 * Date: 09/02/20
 * Time: 16:17
 */

namespace App\Services\Traits;


trait ApiTrait
{

    public function urlDetail()
    {
        return 'https://api.meuvesti.com/api/appcompras/products';
    }

    public function parameters()
    {
        return 'scheme_url=tnw&v=1.1';
    }
}