<?php

/**
 * Arxmin helpers to handle common functions used by Arxmin and his modules
 */
if (!function_exists('lg')) {
    function lg($id = null, $parameters = array(), $domain = 'messages', $locale = null)
    {
        return Arxmin::trans($id, $parameters, $domain, $locale);
    }
}

/**
 * Arxmin helpers
 */
if (!function_exists('arxminUrl')) {
    function arxminUrl($path, $params = [], $secure = null)
    {
        return Arxmin::url($path, $params, $secure);
    }
}

if (!function_exists('arxminApi')) {
    function arxminApi($endpoint, $data = [])
    {
        return Arxmin::api($endpoint, $data);
    }
}

if (!function_exists('arxminAsset')) {
    function arxminAsset($path, $params = [], $secure = null)
    {
        return Arxmin::getAssetsUrl($path, $params, $secure);
    }
}

/**
 * Module helpers
 */
if (!function_exists('moduleName')) {
    function moduleName()
    {
        return \Arxmin\Module::getUsed();
    }
}

if (!function_exists('moduleUrl')) {
    function moduleUrl($path)
    {
        return \Arxmin\Module::moduleUrl($path);
    }
}

if (!function_exists('moduleAsset')) {
    function moduleAsset($path)
    {
        return \Arxmin\Module::moduleAsset($path);
    }
}

if (!function_exists('modulePath')) {
    function modulePath($path)
    {
        return \Arxmin\Module::modulePath($path);
    }
}