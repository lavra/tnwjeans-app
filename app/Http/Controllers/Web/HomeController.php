<?php

namespace App\Http\Controllers\Web;

use App\Services\UserAgent;
use App\Services\ApiService;
use App\Http\Controllers\Controller;
use App\Interfaces\SocialNetworkInterface as InterSocial;
use App\Interfaces\ConfigSiteInterface as ConfigSite;


class HomeController extends Controller
{

    /**
     * Identifica a view
     *
     * @var string
     */
    private $view = 'home';

    /**
     * isMobile - isTablet - isDesktop
     *
     * @var bool
     */
    private $userAgent;

    /**
     * Configuração do Site
     *
     * @var mix
     */
    private $configSite;

    /**
     * Dados da Api vesti
     *
     * @var array
     */
    private $apiService;

    /**
     * Dados dos links das redes sociais
     *
     * @var mix
     */
    private $interSocial;



    public function __construct(
        UserAgent $userAgent,
        ConfigSite $configSite,
        ApiService $apiService,
        InterSocial $interSocial)
    {

        $this->userAgent = $userAgent;
        $this->configSite = $configSite;
        $this->apiService = $apiService;
        $this->interSocial = $interSocial;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instagram = [];
        $products = $this->getProducts();
        //$instagram = $this->postInstagram();
        $socials = $this->interSocial->get();
        $configSite = $this->configSite->setId(1);
        $configCompany = $this->apiService->dataCompany();
        $isMobile = $this->userAgent->isMobile();

        return view("{$this->view}.home-1", compact(
            'configSite', 'isMobile', 'socials', 'products', 'instagram', 'configCompany'
        ));
    }

    /**
     * Retorna os produtos da api vesti
     * @return mixed
     */
    public function getProducts()
    {
        $url = 'https://api.meuvesti.com/api/appcompras/catalogues?scheme_url=tnw&perpage=30&page=1&v=1.2';
        $response = $this->apiService->getUrl($url);
        if (empty($response)) {
           return $response;
        }

        return $response->response->data;
    }


    /**
     * Retorna posts instagram
     * @return mixed
     */
    public function postInstagram()
    {
        $data = array();
        $response = file_get_contents('https://instagram.com/tnwjeans/?__a=1');
       // $response = null;
        if (!$response) {
            return typeJson($data);
        }
        $user = json_decode($response);

        if (isset($user->graphql)) {
            $posts = $user->graphql->user->edge_owner_to_timeline_media->edges;
            if (count($posts) >= 1)  {
                foreach ($posts as $key => $post) {
                    $data[$key]['url'] = "https://www.instagram.com/p/{$post->node->shortcode}";
                    $data[$key]['image'] = $post->node->thumbnail_src;
                    $data[$key]['likes'] = $post->node->edge_liked_by->count;
                }
            }
        }

        return typeJson($data);
    }
}
