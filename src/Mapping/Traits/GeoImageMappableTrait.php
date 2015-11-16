<?php
/**
 * CoolMS2 Geo Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/geo-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsGeoMap\Mapping\Traits;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\Common\Collections\Collection,
    CmsGeoMap\Mapping\ImageMapInterface;

trait GeoImageMappableTrait
{
    /**
     * @var ImageMapInterface[]
     *
     * @ORM\OneToMany(targetEntity="CmsGeoMap\Mapping\ImageMapInterface",
     *      mappedBy="territory",
     *      orphanRemoval=true,
     *      cascade={"persist","remove"},
     *      fetch="EXTRA_LAZY")
     * @Form\ComposedObject({
     *      "target_object":"CmsGeoMap\Mapping\ImageMapInterface",
     *      "is_collection":true,
     *      "options":{
     *          "name":"geoImageMaps",
     *          "label":"Image maps",
     *          "count":0,
     *          "should_create_template":true,
     *          "allow_add":true,
     *          "allow_remove":true,
     *          "partial":"cms-geo-map/image-map/fieldset",
     *          "text_domain":"CmsGeoMap",
     *      }})
     */
    protected $geoImageMaps = [];

    /**
     * __construct
     * 
     * Initializes geo image maps
     */
    public function __construct()
    {
        $this->geoImageMaps = new ArrayCollection();
    }

    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function setGeoImageMaps($maps)
    {
        $this->clearGeoImageMaps();
        $this->addGeoImageMaps($maps);

        return $this;
    }

    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function addGeoImageMaps($maps)
    {
        foreach ($maps as $map) {
            $this->addGeoImageMap($map);
        }

        return $this;
    }

    /**
     * @param ImageMapInterface $map
     * @return self
     */
    public function addGeoImageMap(ImageMapInterface $map)
    {
        $this->getGeoImageMaps()->add($map);
        if (!$map->getTerritory()) {
            $map->setTerritory($this);
        }

        return $this;
    }

    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function removeGeoImageMaps($maps)
    {
        foreach ($maps as $map) {
            $this->removeGeoImageMap($map);
        }

        return $this;
    }

    /**
     * @param ImageMapInterface $map
     * @return self
     */
    public function removeGeoImageMap(ImageMapInterface $map)
    {
        $this->getGeoImageMaps()->removeElement($map);
        return $this;
    }

    /**
     * @return bool
     */
    public function hasGeoImageMaps()
    {
        return !!count($this->geoImageMaps);
    }

    /**
     * @param ImageMapInterface $map
     * @return bool
     */
    public function hasGeoImageMap(ImageMapInterface $map)
    {
        return $this->getGeoImageMaps()->contains($map);
    }

    /**
     * Removes all maps
     *
     * @return self
     */
    public function clearGeoImageMaps()
    {
        $this->getGeoImageMaps()->clear();
        return $this;
    }

    /**
     * @return Collection
     */
    public function getGeoImageMaps()
    {
        return $this->geoImageMaps;
    }
}
