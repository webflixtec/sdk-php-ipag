<?php

namespace Ipag\Sdk\Endpoint;

use Ipag\Sdk\Core\Endpoint;
use Ipag\Sdk\Http\Response;
use Ipag\Sdk\Model\PaymentLink;

/**
 * PaymentLinksEndpoint class
 *
 * Classe responsável pelo controle dos endpoints do recurso Payment Links.
 */
class PaymentLinksEndpoint extends Endpoint
{
    protected string $location = '/service/resources/payment_links';

    /**
     * Endpoint para criar um recurso `Payment Link`
     *
     * @param PaymentLink $paymentLink
     * @return Response
     */
    public function create(PaymentLink $paymentLink): Response
    {
        return $this->_POST($paymentLink->jsonSerialize());
    }
    
    /**
     * Endpoint para atualizar um recurso `Payment Link`
     *
     * @param PaymentLink $paymentLink
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function update(PaymentLink $paymentLink, int $id): Response
    {
        $this->location = vsprintf('/service/v2/payment_links/%s', [
            $id
        ]);
        
        return $this->_PUT($paymentLink);
    }

    /**
     * Endpoint para obter um recurso `Payment Link`
     *
     * @param integer $id
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getById(int $id): Response
    {
        return $this->_GET(['id' => $id]);
    }

    /**
     * Endpoint para obter um recurso `Payment Link` pelo Código Externo
     *
     * @param integer $externalCode
     * @return Response
     *
     * @codeCoverageIgnore
     */
    public function getByExternalCode(int $externalCode): Response
    {
        return $this->_GET(['external_code' => $externalCode]);
    }
}