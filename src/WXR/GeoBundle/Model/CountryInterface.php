<?php

namespace WXR\GeoBundle\Model;

/**
 * WXR\GeoBundle\Model\CountryInterface
 *
 * @author Lionel Gaillard <lionel.gaillard@wxrstudios.com>
 */
interface CountryInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $iso
     * @return CountryInterface
     */
    public function setIso($iso);

    /**
     * @return string
     */
    public function getIso();

    /**
     * @param string $name
     * @return CountryInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * Set regions
     *
     * @param array|\Traversable $regions
     * @return CountryInterface
     */
    public function setRegions($regions);

    /**
     * @param RegionInterface $region
     * @return CountryInterface
     */
    public function addRegion(RegionInterface $region);

    /**
     * @param RegionInterface $region
     * @return CountryInterface
     */
    public function removeRegion(RegionInterface $region);

    /**
     * @return CountryInterface
     */
    public function clearRegions();

    /**
     * @return RegionInterface[]
     */
    public function getRegions();

    /**
     * @param RegionInterface $region
     * @return boolean
     */
    public function hasRegion(RegionInterface $region);

    /**
     * @return string
     */
    public function __toString();
}
