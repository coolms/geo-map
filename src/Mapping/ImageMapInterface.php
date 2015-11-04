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

use CmsImageMap\Mapping\MapInterface as GenericImageMapInterface;

interface ImageMapInterface extends GenericImageMapInterface
{
    /**
     * @param GeoImageMappableInterface $territory
     * @return self
     */
    public function setTerritory(GeoImageMappableInterface $territory);

    /**
     * @return GeoImageMappableInterface
     */
    public function getTerritory();
}
