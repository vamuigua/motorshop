<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Car extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cars';

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
    protected $fillable = ['car_make_id', 'car_model_id', 'year', 'mileage', 'body_type', 'condition_type', 'transmission_type', 'price', 'duty', 'negotiable', 'fuel_type', 'interior_type', 'color_type', 'engine_size', 'description'];

    /**
     * Return all Car Body Types
     */
    public function bodyTypes()
    {
        return [
            'Saloon' => 'Saloon',
            'Hatchback' => 'Hatchback',
            '4 Wheel Drive & SUV' => '4 Wheel Drive & SUV',
            'Station Wagons' => 'Station Wagon',
            'Pickup' => 'Pickup',
            'Motorbikes' => 'Motorbikes',
            'Convertibles' => 'Convertibles',
            'Buses, Taxis and Vans' => 'Buses, Taxis and Vans',
            'Trucks' => 'Trucks',
            'Machinery and Tractors' => 'Machinery and Tractors',
            'Trailers' => 'Trailers',
            'Minis' => 'Minis',
            'Coupes' => 'Coupes',
            'Quad Bikes' => 'Quad Bikes',
            'Other' => 'Other',
        ];
    }

    /**
     * Return all Car Condition Types
     */
    public function conditionTypes()
    {
        return [
            'Brand-new' => 'Brand New',
            'Foreign-used' => 'Foreign Used',
            'Locally-used' => 'Locally Used',
        ];
    }

    /**
     * Return all Car Interor Types
     */
    public function interiorTypes()
    {
        return [
            'cloth' => 'Cloth',
            'leather' => 'Leather',
            'other' => 'Other',
        ];
    }

    /**
     * Return all Car Transmission Types
     */
    public function transmissionTypes()
    {
        return [
            'manual' => 'Manual',
            'automatic' => 'Automatic',
            'other' => 'Other',
        ];
    }

    /**
     * Return all Car Transmission Types
     */
    public function dutyTypes()
    {
        return [
            'Duty-excempted' => 'Duty Excempted',
            'Duty-not-paid' => 'Duty Not Paid',
            'Duty-paid' => 'Duty Paid',
            'Not-specified' => 'Not Specified',
        ];
    }

    /**
     * Return all Car Fuel Types
     */
    public function fuelTypes()
    {
        return [
            'petrol' => 'Petrol',
            'diesel' => 'Diesel',
            'diesel-hybrid' => 'Diesel-Hybrid',
            'electric' => 'Electric',
            'other' => 'Other',
        ];
    }

    /**
     * Return all Car Color Types
     */
    public function colorTypes()
    {
        return [
            'Black' => 'Black',
            'Silver' => 'Silver',
            'Red' => 'Red',
            'Maroon' => 'Maroon',
            'Brown' => 'Brown',
            'Blue' => 'Blue',
            'Dark-Blue' => 'Dark Blue',
            'yellow' => 'Yellow',
            'White' => 'White',
            'Green' => 'Green',
            'Dark-Green' => 'Dark Green',
            'Purple' => 'Purple',
            'Pink' => 'Pink',
            'Orange' => 'Orange',
            'Grey' => 'Grey',
            'Dark-grey' => 'Dark Grey',
            'Gold' => 'Gold',
            'Beige' => 'Beige',
            'Pearl' => 'Pearl',
            'Other' => 'Other',
        ];
    }

    /**
     * Get the CarMake of the Car
     */
    public function carMake($id)
    {
        return CarMake::find($id);
    }

    /**
     * Get the CarModel of the Car
     */
    public function carModel($id)
    {
        return CarModel::find($id);
    }

    // Get all Images of a car
    public function images()
    {
        return $this->getMedia('car_image');
    }

    // Media conversions

    public $registerMediaConversionsUsingModelInstance = true;

    public function registerMediaConversions(Media $media = null): void 
    {
        // make a thumbnail
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
}
