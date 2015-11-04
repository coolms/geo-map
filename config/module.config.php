<?php
/**
 * CoolMS2 Geo Map Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/geo-map for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsGeoMap;

return [
    'controllers' => [
        'invokables' => [
            'CmsGeoMap\Controller\Admin' => 'CmsGeoMap\Controller\AdminController',
        ],
    ],
    'router' => [
        'routes' => [
            
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
                'text_domain' => __NAMESPACE__,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],
];
