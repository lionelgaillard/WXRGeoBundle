WXRGeoBundle
============

Installation
------------

### Composer

``` json
        "wxr/geo-bundle": "dev-master"
```

`$ composer update`

### AppKernel (1)

``` php
        new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

        new WXR\CommonBundle\WXRCommonBundle(),
        new WXR\GeoBundle\WXRGeoBundle(),
```

### SonataEasyExtendsBundle

`$ php app/console sonata:easy-extends:generate WXRGeoBundle --dest=src`

-   [SonataEasyExtendsBundle documentation](http://sonata-project.org/bundles/easy-extends/master/doc/index.html)

### AppKernel (2)

``` php
        new Application\WXR\GeoBundle\ApplicationWXRGeoBundle(),
```

### Routing

``` yaml
# app/config/routing.yml
wxr_geo:
    resource: "@WXRGeoBundle/Resources/config/routing.yml"
    prefix: /geo

```

Configuration
-------------

WXRGeoBundle doesn't require any configuration.

### Default configuration

``` yaml
wxr_geo:
    translation_domain: WXRGeoBundle
    country:
        manager: wxr_geo.country.manager.default
        admin:
            class: WXR\GeoBundle\Admin\Entity\CountryAdmin
            controller: SonataAdminBundle:CRUD
    region:
        manager: wxr_geo.region.manager.default
        admin:
            class: WXR\GeoBundle\Admin\Entity\RegionAdmin
            controller: SonataAdminBundle:CRUD
    city:
        manager: wxr_geo.city.manager.default
        admin:
            class: WXR\GeoBundle\Admin\Entity\CityAdmin
            controller: SonataAdminBundle:CRUD
    address:
        manager: wxr_geo.address.manager.default
        admin:
            class: WXR\GeoBundle\Admin\Entity\AddressAdmin
            controller: SonataAdminBundle:CRUD
```