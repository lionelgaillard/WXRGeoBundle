<?php

namespace WXR\GeoBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class WXRGeoExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('wxr_geo.translation_domain', $config['translation_domain']);

        // Country
        $container->setAlias('wxr_geo.country.manager', $config['country']['manager']);
        $container->setParameter('wxr_geo.country.admin.class', $config['country']['admin']['class']);
        $container->setParameter('wxr_geo.country.admin.controller', $config['country']['admin']['controller']);

        // Region
        $container->setAlias('wxr_geo.region.manager', $config['region']['manager']);
        $container->setParameter('wxr_geo.region.admin.class', $config['region']['admin']['class']);
        $container->setParameter('wxr_geo.region.admin.controller', $config['region']['admin']['controller']);

        // City
        $container->setAlias('wxr_geo.city.manager', $config['city']['manager']);
        $container->setParameter('wxr_geo.city.admin.class', $config['city']['admin']['class']);
        $container->setParameter('wxr_geo.city.admin.controller', $config['city']['admin']['controller']);

        // Address
        $container->setAlias('wxr_geo.address.manager', $config['address']['manager']);
        $container->setParameter('wxr_geo.address.admin.class', $config['address']['admin']['class']);
        $container->setParameter('wxr_geo.address.admin.controller', $config['address']['admin']['controller']);

        // Place
        $container->setAlias('wxr_geo.place.manager', $config['place']['manager']);
        $container->setParameter('wxr_geo.place.admin.class', $config['place']['admin']['class']);
        $container->setParameter('wxr_geo.place.admin.controller', $config['place']['admin']['controller']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
