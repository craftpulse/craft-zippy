<?php
/**
 * Zippy plugin for Craft CMS 3.x
 *
 * Zip on or multiple assets
 *
 * @link      https://percipio.london
 * @copyright Copyright (c) 2022 Percipio London
 */

namespace percipiolondon\zippy\controllers;

use percipiolondon\zippy\Zippy;

use Craft;
use craft\web\Controller;
use yii\web\Response;

/**
 * Zippy Controller
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
 * @package   Zippy
 * @since     3.0.0
 */
class ZippyController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    /**
     * Handle the requests with the assets the user wants to zip,
     * This is a post event
     *
     * @return Response|null
     */
    public function actionIndex(): ?Response
    {
        $this->requirePostRequest();
        
        $request = Craft::$app->getRequest();

        $files = $request->getBodyParam('files') ?? null;
        $filename = $request->getBodyParam('slug') ?? '';

        if ($files) {
            $archive = Zippy::$plugin->zippy->zip('eef-'.$filename, $files);
            return Craft::$app->getResponse()->sendFile($archive, null, ['forceDownload' => true]);
        }

        return null;
    }
}
