<?php

namespace WXR\GeoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('wxr_geo');

        $rootNode
            ->children()
                ->booleanNode('admin')->defaultValue(false)->end()
            ->end()
        ;

        $this->addCountrySection($rootNode);
        $this->addRegionSection($rootNode);
        $this->addCitySection($rootNode);
        $this->addLocationSection($rootNode);

        return $treeBuilder;
    }

    private function addCountrySection($rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('country')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('WXR\GeoBundle\Entity\Country')->end()
                        ->scalarNode('manager')->defaultValue('wxr_geo.country.default_manager')->end()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('wxr_geo.country.form.default_type')->end()
                                ->scalarNode('handler')->defaultValue('wxr_geo.country.form.default_handler')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addRegionSection($rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('region')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('WXR\GeoBundle\Entity\Region')->end()
                        ->scalarNode('manager')->defaultValue('wxr_geo.region.default_manager')->end()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('wxr_geo.region.form.default_type')->end()
                                ->scalarNode('handler')->defaultValue('wxr_geo.region.form.default_handler')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addCitySection($rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('city')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('WXR\GeoBundle\Entity\City')->end()
                        ->scalarNode('manager')->defaultValue('wxr_geo.city.default_manager')->end()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('wxr_geo.city.form.default_type')->end()
                                ->scalarNode('handler')->defaultValue('wxr_geo.city.form.default_handler')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addLocationSection($rootNode)
    {
        $rootNode
            ->children()
                ->arrayNode('location')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->scalarNode('class')->defaultValue('WXR\GeoBundle\Entity\Location')->end()
                        ->scalarNode('manager')->defaultValue('wxr_geo.location.default_manager')->end()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('wxr_geo.location.form.default_type')->end()
                                ->scalarNode('handler')->defaultValue('wxr_geo.location.form.default_handler')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
