<?php

namespace App\Http\Controllers\Web;

use App\Services\UserAgent;
use App\Services\ApiService;
use Illuminate\Http\Request;
use App\Models\WhatsappMessage;
use App\Http\Controllers\Controller;
use App\Interfaces\WhatsappInterface as InterWhatsapp;
use App\Interfaces\SocialNetworkInterface as InterSocial;


class WhatsappController extends Controller
{

    private $userAgent;
    private $apiService;
    private $interNetwork;
    private $interWhatsapp;
    private $whatsappMessage;

    public function __construct(
        UserAgent $userAgent,
        ApiService $apiService,
        InterSocial $interNetwork,
        InterWhatsapp $interWhatsapp,
        WhatsappMessage $whatsappMessage)
    {
        $this->userAgent = $userAgent;
        $this->apiService = $apiService;
        $this->interNetwork = $interNetwork;
        $this->interWhatsapp = $interWhatsapp;
        $this->whatsappMessage = $whatsappMessage;
    }

    /**
     * Registra os acessos e retona a url do detalhe do produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function share(Request $request)
    {
        $input = $request->all();
        $input['product_id'] = $input['id'];
        $register = $this->interWhatsapp->create($input);
        $network = $this->interNetwork->setId($input['social_network_id']);
        $redirect = route('social-detail', ['network' => $network->name, 'id' => $input['id']]);

        return response()->json(['redirect' => $redirect]);
    }


    public function comment(Request $request)
    {
        $input = $request->all();

        if ($input['code'] == 'Brasil') {
            $input['code'] = '55';
        } else {
            $input['code'] = preg_replace("/[^0-9]/", "", $input['code']);
        }

        $input['phone'] = preg_replace("/[^0-9]/", "", $input['phone']);

        if (empty($input['name'])) {
            $error['name'] = 'O nome é obrigatório';
        }
        if (empty($input['code'])) {
            $error['country_selector'] = 'O código do pais é obrigatório';
        }
        if (empty($input['phone'])) {
            $error['phone'] = 'O número do whatsapp é obrigatório';
        }
        if (empty($input['message'])) {
            $error['message'] = 'A mensadem é obrigatória';
        }

        if (!empty($error)) {
            return response()->json(['error' => $error, 'message' => 'Verifique os campos abrigatórios']);
        } else {
            $data = $this->whatsappMessage->create($input);
            $configCompany = $this->apiService->dataCompany();
            ($this->userAgent->isMobile()) ? $uag = 'api' : $uag = 'web';
            $redirect = "https://{$uag}.whatsapp.com/send?phone=55{$configCompany->whatsapp}&text={$data->message}&source=&data=&app_absent=";

            return response()->json([
                'success' => true,
                'redirect' => $redirect,
                'message' => 'Aguarde, redirecionando para seu Whatsapp']);
        }
    }

}