<?php
namespace mikescott\Emissary;

class Middleware {
    protected $providers = [];

    public function __construct($providers) {
        $this->providers = $providers;
    }

    public function __invoke($request, $response, $next)
    {
        $emissary = new Emissary($next);
        $emissary->addProviders($this->providers);
        return $next($request, $response);
    }
}