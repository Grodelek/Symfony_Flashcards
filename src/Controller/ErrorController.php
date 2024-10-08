<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ErrorController extends AbstractController
{
    public function show(\Throwable $exception): Response
    {
        $statusCode = $exception instanceof HttpException ? $exception->getStatusCode(): 500;
        return $this->render("@Twig/Exception/error{$statusCode}.html.twig", [
            'exception' => $exception,
            'statusCode' => $statusCode,
        ], new Response('', $statusCode));
    }
}