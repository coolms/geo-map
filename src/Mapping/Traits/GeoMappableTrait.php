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
    CmsGeoMap\Mapping\MapInterface;

trait GeoMappableTrait
{
    /**
     * @var MapInterface[]
     *
     * @todo ToMany relation on calendar property is temporary solution.
     *       Actually we need a ToOne relation with a appropriate territory.
     *       {@see https://github.com/doctrine/doctrine2/pull/970)
     *
     * @ORM\OneToMany(targetEntity="CmsGeoMap\Mapping\MapInterface",
     *      mappedBy="territory",
     *      orphanRemoval=true,
     *      cascade={"persist","remove"},
     *      fetch="EXTRA_LAZY")
     * @Form\Exclude()
     */
    protected $geoMap = [];

    /**
     * __construct
     *
     * Initializes geo map
     */
    public function __construct()
    {
        $this->geoMap = new ArrayCollection();
    }

    /**
     * @param MapInterface $map
     * @return self
     */
    public function setGeoMap(MapInterface $map)
    {
        foreach ($this->geoMap as $key => $data) {
            unset($this->geoMap[$key]);
        }

        $this->geoMap[] = $map;

        return $this;
    }

    /**
     * @return MapInterface
     */
    public function getGeoMap()
    {
        foreach ($this->geoMap as $map) {
            return $map;
        }
    }
}
