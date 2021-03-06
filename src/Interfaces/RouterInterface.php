<?php

declare(strict_types=1);

/*
 * This code is under BSD 3-Clause "New" or "Revised" License.
 *
 * PHP version 7 and above required
 *
 * @category  RoutingManager
 *
 * @author    Divine Niiquaye Ibok <divineibok@gmail.com>
 * @copyright 2019 Biurad Group (https://biurad.com/)
 * @license   https://opensource.org/licenses/BSD-3-Clause License
 *
 * @link      https://www.biurad.com/projects/routingmanager
 * @since     Version 0.1
 */

namespace Flight\Routing\Interfaces;

use Flight\Routing\RouteResults;
use Psr\Http\Message\ServerRequestInterface as Request;
use Flight\Routing\Exceptions\UrlGenerationException;

/**
 * Interface defining required router capabilities.
 *
 * This Interface is an implementation of Router subcomponent for Expressive
 * from the makers of Zend Framework.
 *
 * Implemented so routing is flexible, instead of a rigid router."
 *
 * @copyright Copyright (c) 2015-2017 Zend Technologies USA Inc. (https://www.zend.com)
 */
interface RouterInterface
{
    /**
     * Add a route.
     *
     * This method adds a route against which the underlying implementation may
     * match. Implementations MUST aggregate route instances, but MUST NOT use
     * the details to inject the underlying router until `match()` and/or
     * `generateUri()` is called.  This is required to allow consumers to
     * modify route instances before matching (e.g., to provide route options,
     * inject a name, etc.).
     *
     * The method MUST raise \RuntimeException if called after either `match()`
     * or `generateUri()` have already been called, to ensure integrity of the
     * router between invocations of either of those methods.
     *
     * @throws \RuntimeException when called after match() or
     *     generateUri() have been called.
     */
    public function addRoute(RouteInterface $route) : void;

    /**
     * Match a request against the known routes.
     *
     * Implementations will aggregate required information from the provided
     * request instance, and pass them to the underlying router implementation;
     * when done, they will then marshal a `RouteResults` instance indicating
     * the results of the matching operation and return it to the caller.
     */
    public function match(Request $request) : RouteResults;

    /**
     * Generate a URI from the named route.
     *
     * Takes the named route and any substitutions, and attempts to generate a
     * URI from it.
     *
     * The URI generated MUST NOT be escaped. If you wish to escape any part of
     * the URI, this should be performed afterwards; consider passing the URI
     * to league/uri to encode it.
     *
     * @param RouteInterface $route         The Route instance name.
     * @param string[]|array $substitutions key => value option pairs to pass to the
     *                                      router for purposes of generating a URI; takes precedence over options
     *                                      present in route used to generate URI
     *
     * @see https://github.com/auraphp/Aura.Router/blob/3.x/docs/generating-paths.md
     * @see https://docs.zendframework.com/zend-router/routing/
     *
     * @throws UrlGenerationException if the route name is not known
     *                                or a parameter value does not match its regex
     */
    public function generateUri(RouteInterface $route, array $substitutions = []) : string;
}
