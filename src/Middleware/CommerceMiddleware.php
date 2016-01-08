<?php

namespace HttpMessagesCommerceMiddleware\Middleware;

use HttpMessages\Http\Request;
use HttpMessages\Http\Response;
use HttpMessages\Exceptions\HttpMessagesException;

class CommerceMiddleware
{
    /**
     * Invoke
     *
     * @return void
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $response = $next($request, $response);

        $response = $this->handle($request, $response);

        return $response;
    }

    private function handle(Request $request, Response $response)
    {
        $route = $request->getRoute();

        if ($route->is('GET', '/api/commerce/{me}')) {
            $customer = \Craft\craft()->commerce_customers->getCustomer();
            $response = $response->withItem($customer);
        }

        if ($route->is('GET', '/api/commerce/product')) {
            \Craft\Craft::dd($request->getCriteria());
            $products = \Craft\craft()->elements->getCriteria('Commerce_Product', $request->getCriteria())->find();
            $response = $response->withCollection($products);
        }

        return $response;
    }

}
