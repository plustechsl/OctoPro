<?php namespace Furroy\Productes;

use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    public function registerNavigation()
    {
        return [
            'productes' => [
                'label'       => 'Productes',
                'url'         => Backend::url('furroy/productes/productes'),
                'icon'        => 'icon-adjust',
                'permissions' => ['furroy.productes.access_productes'],
                'order'       => 500,
            ],
        ];
    }
    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
    }

    /**
     * registerSettings used by the backend.
     */
    public function registerSettings()
    {
    }
}
