<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $common_features = [
            "Airbags",
            "Traction Control",
            "Tinted Windows",
            "Power Steering",
            "Electric Windows",
            "Electric Mirrors",
            "Cup Holders",
            "Armrests",
            "Anti-Lock Brakes",
            "Air Conditioning",
            "AM/FM Radio",
            "Alloy Wheels"
        ];

        $extra_features = [
            "Bullbar",
            "Thumbstart Ignition",
            "Xenon Lights",
            "Wheel Locks",
            "Turbo Charged",
            "Sunroof",
            "Spoilers",
            "Sidesteps",
            "Roof Rack",
            "Rear Camera",
            "Keyless Entry",
            "Front Fog Lamps",
            "Fog Lights",
            "CD Player",
        ];

        $uncommon_features = [
            "Spotlight",
            "Winch",
            "External Winch",
            "Bulletpoof",
        ];

        foreach ($common_features as $common_feature) {
            $feature = new Feature();
            $feature->name = $common_feature;
            $feature->type = 'Common';
            $feature->save();
        }

        foreach ($extra_features as $extra_feature) {
            $feature = new Feature();
            $feature->name = $extra_feature;
            $feature->type = 'Extra';
            $feature->save();
        }

        foreach ($uncommon_features as $uncommon_feature) {
            $feature = new Feature();
            $feature->name = $uncommon_feature;
            $feature->type = 'Uncommon';
            $feature->save();
        }
    }
}
