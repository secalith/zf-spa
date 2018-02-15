<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-helpers for the canonical source repository
 * @copyright Copyright (c) 2015-2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-helpers/blob/master/LICENSE.md New BSD License
 */

namespace Common\Helper;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\RouteResult;
use Webimpress\HttpMiddlewareCompatibility\HandlerInterface as DelegateInterface;
use Webimpress\HttpMiddlewareCompatibility\MiddlewareInterface;

use const Webimpress\HttpMiddlewareCompatibility\HANDLER_METHOD;

/**
 * Pipeline middleware for injecting a RouteHelper with a RouteResult.
 */
class RouteHelperMiddleware implements MiddlewareInterface
{
    /**
     * @var RouteHelper
     */
    private $helper;

    /**
     * @param RouteHelper $helper
     */
    public function __construct(RouteHelper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Inject the RouteHelper instance with a RouteResult, if present as a request attribute.
     *
     * Injects the helper, and then dispatches the next middleware.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface      $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $result = $request->getAttribute(RouteResult::class, false);

        if ($result instanceof RouteResult) {
            $this->helper->setRouteResult($result);
        }

        return $delegate->{HANDLER_METHOD}($request);
    }
}
