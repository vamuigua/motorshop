<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'car_models';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'car_make_id', 'year'];

    /**
     * Get the CarMake of the CarModel.
     */
    public function carMake()
    {
        return $this->belongsTo(CarMake::class);
    }
}
