<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'features';

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
    protected $fillable = ['name', 'type'];

    // Feature Types for Cars
    public function types()
    {
        return [
            'Common',
            'Extra',
            'Uncommon'
        ];
    }

    // The cars that belong to a feature
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
