<?php namespace Furroy\Productes\Models;

use Model;

/**
 * Model
 */
class Producte extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var bool timestamps are disabled.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string table in the database used by the model.
     */
    public $table = 'furroy_productes_productes';

    /**
     * @var array rules for validation.
     */
    public $rules = [
    ];

    public $belongsTo = [
        'client' => [
            'Furroy\Clients\Models\Client',
            'key' => 'client_id',
            'otherKey' => 'id',
            'delete' => true
        ],
    ];

}
