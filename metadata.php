<?php
/**
 * @package FlorianPalme
 * @subpackage DebugBar
 * @author Florian Palme <info@florian-palme.de>
 */


/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'           => 'fpdebugbar',
    'title'        => '<span style="color:#d35400;font-weight:bold;">{</span>FP<span style="color:#d35400;font-weight:bold;">}</span> DebugBar',
    'description'  => 'Integriert eine erweiterbare DebugBar in den OXID eShop, nach Vorbild des Symfony Web Profilers',
    'thumbnail'    => 'logo.png',
    'version'      => '1.4.0',
    'author'       => 'Florian Palme',
    'url'          => 'http://www.florian-palme.de',
    'email'        => 'info@florian-palme.de',
    'extend'       => [
        \OxidEsales\Eshop\Core\UtilsView::class
            => \FlorianPalme\DebugBar\Core\UtilsView::class,

        \OxidEsales\Eshop\Core\Config::class
            => \FlorianPalme\DebugBar\Core\Config::class,

        \OxidEsales\Eshop\Core\ShopControl::class
            => \FlorianPalme\DebugBar\Core\ShopControl::class,

        \OxidEsales\Eshop\Core\Language::class
            => \FlorianPalme\DebugBar\Core\Language::class,
    ],

    'controllers' => [
        'fpdebugbar_getprofile' => \FlorianPalme\DebugBar\Application\Controller\GetProfileController::class,
    ],

    'events'       => [
        'onActivate' => '\FlorianPalme\DebugBar\Core\Events::onActivate',
        'onDeactivate' => '\FlorianPalme\DebugBar\Core\Events::onDeactivate',
    ],

    'templates'   => [
    ],

    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => 'Application/views/tpl/layout/base/js.tpl',
        ]
    ],

    'settings' => [
        [
            'group' => 'debugbarMain',
            'name' => 'debugbarTheme',
            'type' => 'select',
            'value' => 'default',
            'constraints' => 'default|forrest|plum|fortressofsolitude|herbs',
        ],
        [
            'group' => 'debugbarMain',
            'name' => 'debugbarTrustedIps',
            'type' => 'arr',
            'value' => [],
        ],
        [
            'group' => 'debugbarMain',
            'name' => 'debugbarMaxProfiles',
            'type' => 'str',
            'value' => 30,
        ],
    ],
];
