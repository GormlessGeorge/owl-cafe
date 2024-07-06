<?php

namespace App\Http\Controllers;

use App\Service\PaymentService;
use Illuminate\Http\Request;
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

class PaymentController extends Controller
{
    public function index()
    {

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
     * @throws UnauthorizedException
     * @throws ApiConnectionException
     */
    public function create(Request $request, PaymentService $service): \Illuminate\Http\RedirectResponse
    {
        // $amount = float($request)
        $amount = 10;
        $description = "test";
        $link = $service->createPayment($amount, $description);

        return redirect()->away($link);
    }

    public function callback()
    {
        
    }
}
