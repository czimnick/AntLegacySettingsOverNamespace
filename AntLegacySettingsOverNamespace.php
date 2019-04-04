<?php

namespace AntLegacySettingsOverNamespace;

use Shopware\Components\Plugin;
use Shopware\Components\Console\Application;
use AntLegacySettingsOverNamespace\Commands\LegacySettingsOverNamespace;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Shopware-Plugin AntLegacySettingsOverNamespace.
 */
class AntLegacySettingsOverNamespace extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('ant_legacy_settings_over_namespace.plugin_dir', $this->getPath());
        parent::build($container);
    }

}
