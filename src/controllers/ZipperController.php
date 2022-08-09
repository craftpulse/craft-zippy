<?php
/**
 * Zipper plugin for Craft CMS 3.x
 *
 * Zip on or multiple assets
 *
 * @link      https://percipio.london
 * @copyright Copyright (c) 2022 Percipio London
 */

namespace percipiolondoncraftzipper\zipper\controllers;

use percipiolondoncraftzipper\zipper\Zipper;

use Craft;
use craft\web\Controller;

/**
 * Zipper Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Percipio London
 * @package   Zipper
 * @since     3.0.0
 */
class ZipperController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/zipper/zipper
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the ZipperController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/zipper/zipper/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the ZipperController actionDoSomething() method';

        return $result;
    }
}
