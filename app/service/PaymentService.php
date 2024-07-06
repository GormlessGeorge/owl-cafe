<?php

namespace App\Service;

use YooKassa\Client;
use YooKassa\Common\Exceptions\ApiConnectionException;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\AuthorizeException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class PaymentService
{

    private function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookasa.shop_id'), config('services.yookasa.secret_key'));

        return $client;
    }

    /**
     * @throws NotFoundException
     * @throws ApiException
     * @throws ResponseProcessingException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws AuthorizeException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws ApiConnectionException
     * @throws UnauthorizedException
     */
    public function createPayment(float $amount, string $description, array $options = [])
    {
        $client = $this->getClient();
        $payment = $client->createPayment([
            'amount' => [
                'value' => 100.0,
                'currency' => 'RUB',
            ],
            'capture'=> true,
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => route('mainpage.index'),
            ),
            'description' => 'baba'
        ],uniqid('', true));

        return $payment->getConfirmation()->getConfirmationUrl();
    }
}
