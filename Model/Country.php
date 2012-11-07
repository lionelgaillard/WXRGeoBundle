<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\Country
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
abstract class Country implements CountryInterface
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * @var string
     */
    protected $iso;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var RegionInterface[]
     */
    protected $regions;


    public function __construct()
    {
        $this->regions = array();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setIso($iso)
    {
        $this->iso = strtoupper($iso);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setRegions($regions)
    {
        $this->clearRegions();

        foreach ($regions as $region) {
            $this->addRegion($region);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addRegion(RegionInterface $region)
    {
        if (!$this->hasRegion($region)) {
            $region->setCountry($this);
            $this->regions[] = $region;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeRegion(RegionInterface $region)
    {
        if ($this->hasRegion($region)) {
            $key = array_search($region, $this->regions, true);
            $region->setCountry(null);
            unset($this->regions[$key]);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function clearRegions()
    {
        foreach ($this->regions as $region) {
            $region->setCountry(null);
        }

        $this->regions = array();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * {@inheritDoc}
     */
    public function hasRegion(RegionInterface $region)
    {
        return array_search($region, $this->regions, true) !== false;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->getName();
    }
}
