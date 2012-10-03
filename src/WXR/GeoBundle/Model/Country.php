<?php

namespace WXR\GeoBundle\Model;

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
     * @var array
     */
    protected $regions;

    public function __construct()
    {
        $this->regions = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setIso($iso)
    {
        $this->iso = strtoupper($iso);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function addRegion(RegionInterface $region)
    {
        if (!$this->hasRegion($region)) {
            $this->regions[] = $region;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeRegion(RegionInterface $region)
    {
        if ($this->hasRegion($region)) {
            $key = array_search($region, $this->regions, true);
            unset($this->regions[$key]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clearRegions()
    {
        $this->regions = array();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRegion(RegionInterface $region)
    {
        return array_search($region, $this->regions, true) !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocations()
    {
        $locations = array();
        foreach ($this->regions as $region) {
            $locations = array_merge($locations, $region->getLocations());
        }

        return $locations;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->name;
    }
}
