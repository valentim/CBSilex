<?php
namespace Clickbus\Controller;

use Clickbus\RestHandler\DataTransfer\Request\Search\SearchRequest;
use Symfony\Component\HttpFoundation\Request;

use Silex\Application;

class SearchController extends AbstractController
{
    public function getAction(Application $app, Request $request)
    {
        $bookingEngine = $this->getBookingEngine($app, $request);
        $searchTransfer = $this->getTransfer(new SearchRequest, $request->request->all());
        $response = $bookingEngine->getSearch($searchTransfer);

        return $app->json($response->getResult(), 200);
    }
}
