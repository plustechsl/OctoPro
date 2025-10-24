<?php namespace Furroy\Clients;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin class
 */
class Plugin extends PluginBase
{
    public function registerNavigation()
    {
        return [
            'mostrarbiografia' => [
                'label'       => 'Mostrar Biografía',
                'url'         => Backend::url('furroy/clients/perfil'),
                'icon'        => 'icon-user',
                'permissions' => ['furroy.clients.access_mostrarbiografia'],
                'order'       => 400,
            ],
            'editarbiografia' => [
                'label'       => 'Editar Biografía',
                'url'         => Backend::url('backend/users/myaccount'),
                'icon'        => 'icon-edit',
                'permissions' => ['furroy.clients.access_editarbiografia'],
                'order'       => 410,
            ],
            'clients' => [
                'label'       => 'Clients',
                'url'         => Backend::url('furroy/clients/clients'),
                'icon'        => 'icon-users',
                'permissions' => ['furroy.clients.access_clients'],
                'order'       => 500,
            ],
            'encarregs' => [
                'label'       => 'Encarregs',
                'url'         => Backend::url('furroy/clients/encarregs'),
                'icon'        => 'icon-briefcase',
                'permissions' => ['furroy.clients.access_encarrecs'],
                'order'       => 510,
            ],
            // El menú Productes debe estar solo en el plugin productes, no aquí.
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
