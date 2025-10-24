<?php namespace Custom\MallUserListener;

use System\Classes\PluginBase;
use Event;
use OFFLINE\Mall\Models\Customer;
use RainLab\User\Models\User;

class Plugin extends PluginBase
{
    public function boot()
    {
        // Quan es crea un nou client a Mall, copia direccio i telefon a RainLab.User
        Customer::extend(function ($model) {
            $model->bindEvent('model.afterCreate', function () use ($model) {
                if ($model->user_id) {
                    $user = User::find($model->user_id);
                    if ($user) {
                        // Copia la direcció i el telèfon del client (si existeixen)
                        if ($model->default_address) {
                            $user->direccio = $model->default_address->street;
                            $user->telefon = $model->default_address->phone;
                            $user->save();
                        }
                    }
                }
            });
        });
    }
}
