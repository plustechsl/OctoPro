<?php namespace Furroy\Clients\Models;

use Model;

/**
 * Model
 */
class Client extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string table in the database used by the model.
     */
    public $table = 'furroy_clients_clients';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];
    
    // Relación con encargos
    public $hasMany = [
        'encarregs' => ['Furroy\Clients\Models\Encarreg', 'key' => 'id_client']
    ];
    
}
