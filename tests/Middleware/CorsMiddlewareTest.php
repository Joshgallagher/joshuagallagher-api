<?php

namespace Tests\Middleware;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Middleware\Cors;
use Illuminate\Http\Response;

class CorsMiddlewareTest extends TestCase
{
    /**
     * @test
     */
    public function correct_headers_are_set()
    {
        $request = Request::create('/api/articles?page=1', 'GET');

        $middleware = new Cors;

        $response = new Response;

        $response = $middleware->handle($request, function () use ($response) {
            return $response;
        });

        $this->assertEquals($response->headers->get('Access-Control-Allow-Origin'), '*');
        $this->assertEquals($response->headers->get('Access-Control-Allow-Methods'), 'HEAD, GET, OPTIONS');
        $this->assertEquals($response->headers->get('Access-Control-Allow-Headers'), 'Content-Type');
    }

    /**
     * @test
     */
    public function preflight_request_is_handled()
    {
    }
}
