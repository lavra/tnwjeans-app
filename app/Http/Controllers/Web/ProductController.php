<?php

namespace App\Http\Controllers\Web;

use App\Services\UserAgent;
use App\Services\ApiService;
use App\Interfaces\SocialNetworkInterface as InterSocial;
use App\Interfaces\ShoppingInterface as InterShopping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    public function __construct(
        UserAgent $userAgent,
        ApiService $apiService,
        InterSocial $interNetwork,
        InterShopping $interShopping)
    {
        $this->userAgent = $userAgent;
        $this->apiService = $apiService;
        $this->interNetwork = $interNetwork;
        $this->interShopping = $interShopping;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request, $id)
    {
        $url = "{$this->apiService->urlDetail()}/{$id}?{$this->apiService->parameters()}";
        $response = $this->apiService->getUrl($url);
        $product = $response->response;
        $isMobile = $this->userAgent->isMobile();
        $socials = $this->interNetwork->get();
        if ($response->result->success == true) {
            return view('products.product-1', compact(
                    'socials',
                    'product',
                    'isMobile')
            );
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $input = $request->all();
        $shopping  = $this->interShopping->create($input);
        $redirect = $this->apiService->dataCompany();
    
        return response()->json(['redirect' => "{$redirect->api_url}"]);
    }
}
