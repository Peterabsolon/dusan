<?php

$leftMenu = Menu::instance('admin-menu');

$rightMenu = Menu::instance('admin-menu-right');

/**
 * @see https://github.com/pingpong-labs/menus
 * 
 * @example adding additional menu.
 *
 * $leftMenu->url('your-url', 'The Title');
 * 
 * $leftMenu->route('your-route', 'The Title');
 */

$leftMenu->route('admin.services.index', 'Services', [], .5, ['icon' => 'fa fa-wrench']);
$leftMenu->route('admin.settings', 'Settings', [], 7, ['icon' => 'fa fa-cogs']);