<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\UserAgent;
use App\Services\ApiService;
use App\Http\Controllers\Controller;
use App\Interfaces\SocialShareInterface as InterShare;
use App\Interfaces\SocialFollowInterface as InterFollow;
use App\Interfaces\SocialNetworkInterface as InterSocial;

class SocialController extends Controller
{
    private $view;
    private $userAgent;
    private $apiService;
    private $interShare;
    private $interFollow;
    private $interNetwork;

    public function __construct(
        UserAgent $userAgent,
        ApiService $apiService,
        InterShare $interShare,
        InterFollow $interFollow,
        InterSocial $interNetwork)
    {
        $this->view = 'shares';
        $this->userAgent = $userAgent;
        $this->apiService = $apiService;
        $this->interShare = $interShare;
        $this->interFollow = $interFollow;
        $this->interNetwork = $interNetwork;
    }

    /**
     * Quem seguiu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request)
    {
        $follow  = $this->interFollow->create($request->all());
        $network = $this->interNetwork->setId($request['social_network_id']);

        return response()->json(['redirect' => $network->link]);
    }

    /**
     * Compartilhar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request)
    {
        $input = $request->all();
        $input['product_id'] = $input['id'];
        $register = $this->interShare->create($input);
        $network = $this->interNetwork->setId($input['social_network_id']);
        
        $url = route('social-detail', ['network' => $network->name, 'id' => $input['id']]);
    
        return response()->json(['redirect' => $this->getUrlShare($network, $url)]);
    }

    /**
     * Details
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $network, $id)
    {
        $url = "{$this->apiService->urlDetail()}/{$id}?{$this->apiService->parameters()}";
        $response = $this->apiService->getUrl($url);
        if (empty($response)) {
            abort('500', 'Desculpe, houve um erro no servidor');
        }
        $product = $response->response;
        $isMobile = $this->userAgent->isMobile();
        $socials = $this->interNetwork->get();
        if ($response->result->success == true) {
            // Verifica se foi compartilhado
            $share = $network;
            return view("{$this->view}.{$network}", compact(
                'share',
                    'network',
                    'socials',
                    'product',
                    'isMobile')
            );
        }
    }
    
    
    public function getUrlShare($network, $url)
    {
        $isMobile = $this->userAgent->isMobile();
        if ($network->name == 'whatsapp') {
            if ($isMobile) {
                return "whatsapp://send?text={$url}/?share=true";
            } else {
                return "https://web.whatsapp.com/send?text={$url}/?share=true";
            }
        } elseif ($network->name == 'facebook') {
            return "//www.facebook.com/sharer.php?u={$url}";
        }
    }


}