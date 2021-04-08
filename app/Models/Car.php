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
            'Saloon',
            'Hatchback',
            '4 Wheel Drive & SUV',
            'Station Wagon',
            'Pickup',
            'Motorbikes',
            'Convertibles',
            'Buses, Taxis and Vans',
            'Trucks',
            'Machinery and Tractors',
            'Trailers',
            'Minis',
            'Coupes',
            'Quad Bikes',
            'Other'
        ];
    }

    /**
     * Return all Car Condition Types
     */
    public function conditionTypes()
    {
        return [
            'Brand-new',
            'Foreign-used',
            'Locally-used'
        ];
    }

    /**
     * Return all Car Interor Types
     */
    public function interiorTypes()
    {
        return [
            'Cloth',
            'Leather',
            'Other'
        ];
    }

    /**
     * Return all Car Transmission Types
     */
    public function transmissionTypes()
    {
        return [
            'Manual',
            'Automatic',
            'Other'
        ];
    }

    /**
     * Return all Car Transmission Types
     */
    public function dutyTypes()
    {
        return [
            'Duty-excempted',
            'Duty-not-paid',
            'Duty-paid',
            'Not-specified'
        ];
    }

    /**
     * Return all Car Fuel Types
     */
    public function fuelTypes()
    {
        return [
            'Petrol',
            'Diesel',
            'Diesel-Hybrid',
            'Electric',
            'Other'
        ];
    }

    /**
     * Return all Car Color Types
     */
    public function colorTypes()
    {
        return [
            'Black',
            'Silver',
            'Red',
            'Maroon',
            'Brown',
            'Blue',
            'Dark Blue',
            'Yellow',
            'White',
            'Green',
            'Dark Green',
            'Purple',
            'Pink',
            'Orange',
            'Grey',
            'Dark Grey',
            'Gold',
            'Beige',
            'Pearl',
            'Other'
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
            ->sharpen(10)
            ->withResponsiveImages();
    }

    // The features that belong to a car
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    // returns images of a car with its imageURL
    public function imagesWithURL()
    {
        $carImages = $this->images();

        foreach ($carImages as $image) {
            $image["imageURL"] = $image->getUrl('thumb');
        }

        return $carImages;
    }
}
