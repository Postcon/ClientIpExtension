<?php

/**
 * This file is part of ClientIpExtension.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Postcon\ClientIpExtension;

use Behat\Behat\Context\ServiceContainer\ContextExtension;
use Behat\Testwork\ServiceContainer\Extension as ExtensionInterface;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Extension implements ExtensionInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
    }

    /**
     * Returns the extension config key.
     *
     * @return string
     */
    public function getConfigKey()
    {
       return 'postcon_client_ip_extension';
    }

    /**
     * @param ExtensionManager $extensionManager
     */
    public function initialize(ExtensionManager $extensionManager)
    {
    }

    /**
     * Setups configuration for the extension.
     *
     * @param ArrayNodeDefinition $builder
     */
    public function configure(ArrayNodeDefinition $builder)
    {
        $builder
            ->children()
            ->scalarNode('url')->defaultNull()->end()
            ->scalarNode('value')->defaultNull()->end()
            ->end();
    }

    /**
     * Loads extension services into temporary container.
     *
     * @param ContainerBuilder $container
     * @param array $config
     */
    public function load(ContainerBuilder $container, array $config)
    {
        $clientIp = $this->getClientIp($config);

        $definition = $container->register('postcon_client_ip_initializer', ContextInitializer::FQCN);
        $definition->addArgument($clientIp);
        $definition->addTag(ContextExtension::INITIALIZER_TAG);
    }

    /**
     * @param array $config
     *
     * @return string
     * @throws \Exception
     */
    private function getClientIp(array $config)
    {
        if (isset($config['url'])) {
            $clientIp = file_get_contents($config['url']);
        } elseif (isset($config['value'])) {
            $clientIp = $config['value'];
        } else {
            throw new \Exception('Missing configuration value');
        }

        return trim($clientIp);
    }
}
