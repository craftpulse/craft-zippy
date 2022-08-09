<?php
/**
 * Zipper plugin for Craft CMS 3.x
 *
 * Zip on or multiple assets
 *
 * @link      https://percipio.london
 * @copyright Copyright (c) 2022 Percipio London
 */

namespace percipiolondon\zipper\services;

use percipiolondon\zipper\Zipper;

use Craft;
use craft\base\Component;

/**
 * Zipper Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Percipio London
 * @package   Zipper
 * @since     3.0.0
 */
class ZipperService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Zipper::$plugin->zipper->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';

        return $result;
    }
}
