<?php
namespace Clickbus\Controller;

use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController extends AbstractController
{
    public function getAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $dataTransfer = $this->getData($request, 'post');

        $response = $bookingEngine->getSearch($dataTransfer);

        return $app->json($response, 200);
    }
}
