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

interface RouteGroupInterface
{
    public const MIDDLEWARE = 'middleware';
    public const PREFIX = 'prefix';
    public const NAMESPACE = 'namespace';
    public const DOMAIN = 'domain';
    public const NAME = 'name';
    public const DEFAULTS = 'defaults';
    public const REQUIREMENTS = 'patterns';

    /**
     * @return RouteGroupInterface
     */
    public function collectRoutes(): RouteGroupInterface;

    /**
     * Get the RouteGroup's pattern
     *
     * @return string
     */
    public function getPattern(): ?string;
}
