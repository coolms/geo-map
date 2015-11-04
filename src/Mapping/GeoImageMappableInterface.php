<?php
/**
 * CoolMS2 Geo Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/geo-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsGeoMap\Mapping;

interface GeoImageMappableInterface
{
    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function setGeoImageMaps($maps);

    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function addGeoImageMaps($maps);

    /**
     * @param ImageMapInterface $map
     * @return self
     */
    public function addGeoImageMap(ImageMapInterface $map);

    /**
     * @param ImageMapInterface[] $maps
     * @return self
     */
    public function removeGeoImageMaps($maps);

    /**
     * @param ImageMapInterface $map
     * @return self
     */
    public function removeGeoImageMap(ImageMapInterface $map);

    /**
     * @param ImageMapInterface $map
     * @return bool
     */
    public function hasGeoImageMap(ImageMapInterface $map);

    /**
     * @return bool
     */
    public function hasGeoImageMaps();

    /**
     * Removes all maps
     *
     * @return self
     */
    public function clearGeoImageMaps();

    /**
     * @return ImageMapInterface[]
     */
    public function getGeoImageMaps();
}
