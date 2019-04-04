<?php

namespace AntLegacySettingsOverNamespace\Tests;

use AntLegacySettingsOverNamespace\AntLegacySettingsOverNamespace as Plugin;
use Shopware\Components\Test\Plugin\TestCase;
use Shopware\Models\Shop\Shop;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'AntLegacySettingsOverNamespace' => []
    ];

    public static function setUpBeforeClass() {
        parent::setUpBeforeClass();
    }

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')
            ->getPlugins()['AntLegacySettingsOverNamespace'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
