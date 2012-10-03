<?php

namespace WXR\GeoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class WXRGeoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $this->loadCountry($config['country'], $container, $loader);
        $this->loadRegion($config['region'], $container, $loader);
        $this->loadCity($config['city'], $container, $loader);
        $this->loadLocation($config['location'], $container, $loader);
    }

    private function loadCountry(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $loader->load('country.yml');

        // Country class
        $container->setParameter('wxr_geo.country.class', $config['class']);
        unset($config['class']);

        // Country manager
        $container->setAlias('wxr_geo.country.manager', $config['manager']);
        unset($config['manager']);

        // Country form type
        $container->setAlias('wxr_geo.country.form.type', $config['form']['type']);
        $container->getDefinition($config['form']['type'])->addTag('form.type', array('alias' => 'country'));
        unset($config['form']['type']);

        // Country form handler
        $container->setAlias('wxr_geo.country.form.handler', $config['form']['handler']);
        unset($config['form']['handler']);
    }

    private function loadRegion(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $loader->load('region.yml');

        // Region class
        $container->setParameter('wxr_geo.region.class', $config['class']);
        unset($config['class']);

        // Region manager
        $container->setAlias('wxr_geo.region.manager', $config['manager']);
        unset($config['manager']);

        // Region form type
        $container->setAlias('wxr_geo.region.form.type', $config['form']['type']);
        $container->getDefinition($config['form']['type'])->addTag('form.type', array('alias' => 'region'));
        unset($config['form']['type']);

        // Region form handler
        $container->setAlias('wxr_geo.region.form.handler', $config['form']['handler']);
        unset($config['form']['handler']);
    }

    private function loadCity(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $loader->load('city.yml');

        // City class
        $container->setParameter('wxr_geo.city.class', $config['class']);
        unset($config['class']);

        // City manager
        $container->setAlias('wxr_geo.city.manager', $config['manager']);
        unset($config['manager']);

        // City form type
        $container->setAlias('wxr_geo.city.form.type', $config['form']['type']);
        $container->getDefinition($config['form']['type'])->addTag('form.type', array('alias' => 'city'));
        unset($config['form']['type']);

        // City form handler
        $container->setAlias('wxr_geo.city.form.handler', $config['form']['handler']);
        unset($config['form']['handler']);
    }

    private function loadLocation(array $config, ContainerBuilder $container, Loader\YamlFileLoader $loader)
    {
        $loader->load('location.yml');

        // Location class
        $container->setParameter('wxr_geo.location.class', $config['class']);
        unset($config['class']);

        // Location manager
        $container->setAlias('wxr_geo.location.manager', $config['manager']);
        unset($config['manager']);

        // Location form type
        $container->setAlias('wxr_geo.location.form.type', $config['form']['type']);
        $container->getDefinition($config['form']['type'])->addTag('form.type', array('alias' => 'location'));
        unset($config['form']['type']);

        // Location form handler
        $container->setAlias('wxr_geo.location.form.handler', $config['form']['handler']);
        unset($config['form']['handler']);
    }

}
