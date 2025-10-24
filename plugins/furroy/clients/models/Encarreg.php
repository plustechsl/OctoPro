<?php namespace Furroy\Clients\Models;

use Model;
use Carbon\Carbon;

class Encarreg extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'furroy_clients_encarregs';

    // Reglas de validación
    public $rules = [];

    // Relación con clientes
    public $belongsTo = [
        'client' => ['Furroy\Clients\Models\Client', 'foreignKey' => 'id_client']
    ];
    
    // Dropdown con nombre de clientes, guardando el ID
    public function getClientIdOptions()
    {
        return \Furroy\Clients\Models\Client::pluck('nom', 'id');
    }
    /**
     * Campo virtual no guardado en base de datos para el checkbox
     */
    public $data_auto = false; // Por defecto desmarcado

    public function beforeSave()
    {
        if ($this->data_auto) {
            $this->data = Carbon::now('Europe/Madrid');
        }
    }
    public function beforeValidate()
    {
        if ($this->id_client) {
            $client = \Furroy\Clients\Models\Client::find($this->id_client);
            if ($client) {
                $this->nom_client = $client->nom;
            }
        }
    }
}
