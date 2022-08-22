<?php
/**
 * Zippy plugin for Craft CMS 3.x
 *
 * Zip on or multiple assets
 *
 * @link      https://percipio.london
 * @copyright Copyright (c) 2022 Percipio London
 */

namespace percipiolondon\zippy\services;

use craft\elements\Asset;

use Craft;
use craft\base\Component;
use yii\base\Exception;
use yii\helpers\FileHelper;
use ZipArchive;

/**
 * Zippy Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Percipio London
 * @package   Zippy
 * @since     3.0.0
 */
class ZippyService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function will zip the assets files given
     *
     * From any other plugin file, call it like this:
     *
     *     Zippy::$plugin->zippy->zip()
     *
     * @return string | null
     */
    public function zip(string $filename, array $files): ?string
    {
        $assets = Asset::find()
            ->id($files)
            ->all();

        // Set the archive name to create (name chosen + stamp)
        $tempFile = Craft::$app->getPath()
                ->getTempPath() . DIRECTORY_SEPARATOR . $filename . '_' . time() . '.zip';

        // Create the zip archive
        $zip = new ZipArchive();

        // Open the zip and fill it with the assets
        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {

            // loop through the assets to set the contents and the name
            foreach ($assets as $asset) {
                $file = $asset->getCopyOfFile();
                $zip->addFromString($asset->filename, $asset->getContents());
                FileHelper::unlink($file);
            }

            // Stop zipping
            $zip->close();

            // Return the tempFile
            return $tempFile;
        }

        Craft::error(Craft::t('zippy', 'Failed to generate the archive'));

        return null;
    }
}
