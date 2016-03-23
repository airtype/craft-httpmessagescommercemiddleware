<?php

namespace Craft;

class HttpMessagesCommerceMiddlewarePlugin extends BasePlugin
{
    /**
     * Get Name
     *
     * @return string Name
     */
    public function getName()
    {
         return Craft::t('Http Messages - Commerce Middleware');
    }

    /**
     * Get Version
     *
     * @return string Version
     */
    public function getVersion()
    {
        return '0.0.0';
    }

    /**
     * Get Developer
     *
     * @return string Developer
     */
    public function getDeveloper()
    {
        return 'Airtype';
    }

    /**
     * Get Developer Url
     *
     * @return string Developer Url
     */
    public function getDeveloperUrl()
    {
        return 'http://airtype.com';
    }

    /**
     * Register Http Messages Middleware
     *
     * @return string Middleware Handle
     */
    public function registerHttpMessagesMiddlewareHandle()
    {
        return 'commerce';
    }

    /**
     * Register Http Messages Middleware
     *
     * @return string Middlware Class
     */
    public function registerHttpMessagesMiddlewareClass()
    {
        return '\\HttpMessagesCommerceMiddleware\\Middleware\\CommerceMiddleware';
    }

    /**
     * Register Http Messages Routes
     *
     * @return array Routes
     */
    public function registerHttpMessagesRoutes()
    {
        return craft()->config->get('routes', 'httpMessagesCommerceMiddleware');
    }

    /**
     * Init
     *
     * @return void
     */
    public function init()
    {

    }

    /**
     * On Before Install
     *
     * @return false|void
     */
    public function onBeforeInstall()
    {
        $http_messages = craft()->plugins->getPlugin('httpMessages');

        if (!$http_messages) {
            return false;
        }

        if (!version_compare('0.0.0', $http_messages->getVersion(), '>=')) {
            return false;
        }
    }

}
