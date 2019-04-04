<?php

namespace AntLegacySettingsOverNamespace\Commands;

use Shopware\Components\Plugin\ConfigReader;
use Shopware_Components_Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command {
    /**
     * @var ConfigReader
     */
    private $configReader;

    /**
     * @var Shopware_Components_Config
     */
    private $config;

    /**
     * TestCommand constructor.
     * @param ConfigReader $configReader
     * @param Shopware_Components_Config $config
     */
    public function __construct(ConfigReader $configReader, Shopware_Components_Config $config)
    {
        parent::__construct();
        $this->configReader = $configReader;
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('antlegacysettings:test:command');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $plConfig = $this->configReader->getByPluginName('AntLegacySettingsOverNamespace');

        $output->writeln("PluginConfig element 'demoConfig' from ConfigReader;");
        $output->writeln(print_r($plConfig['demoConfig'], true));

        $output->writeln(' ');

        $output->writeln("PluginConfig element 'demoConfig' from Shopware()->Config()->getByNamespace('AntLegacySettingsOverNamespace', 'demoConfig'):");
        $output->writeln(print_r($this->config->getByNamespace('AntLegacySettingsOverNamespace', 'demoConfig'), true));
    }
}
