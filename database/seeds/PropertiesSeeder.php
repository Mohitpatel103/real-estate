<?php



use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use RefineriaWeb\RWRealEstate\Models\Agent;
use RefineriaWeb\RWRealEstate\Models\Location;
use RefineriaWeb\RWRealEstate\Models\Property;
use RefineriaWeb\RWRealEstate\Models\PropertyFeature;
use RefineriaWeb\RWRealEstate\Models\PropertyType;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class PropertiesSeeder
 * @package RefineriaWeb\RWRealEstate\Database\Seeds
 */
class PropertiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $totalRows = 5000;
        $faker = Faker::create();
        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, $totalRows);
        $progress->start();

        for ($i = 0; $i < $totalRows; $i ++) {
            $property = Property::updateOrCreate([
                'name' => $faker->realText(50),
                'description' => $faker->paragraph(5),
                'agent_id' => Agent::inRandomOrder()->first()->id,
                'location_id' => Location::inRandomOrder()->first()->id,
                'properties_type_id' => PropertyType::inRandomOrder()->first()->id,
            ]);

            $bedRooms = $faker->numberBetween(1, 6);
            $bathRooms = $bedRooms + $faker->numberBetween(-2, +2);
            $bathRooms = ($bathRooms <= 0) ? 1 : $bathRooms;
            $builtArea = $bedRooms * $faker->numberBetween(30, 50);

            switch ($property->properties_type_id) {
                case 1: $landArea = $builtArea * 1.5; break;
                case 3: $landArea = $builtArea * 2; break;
                case 4: $landArea = $builtArea * 4; break;
                default: $landArea = $builtArea;
            }

            PropertyFeature::updateOrCreate([
                'property_id' => $property->id,
                'reference' => 'ref' . str_pad($property->id, 6, '0', STR_PAD_LEFT),
                'bedrooms' => $bedRooms,
                'bathrooms' => $bathRooms,
                'private_pool' => $faker->boolean,
                'community_pool' => $faker->boolean,
                'garden' => $faker->boolean,
                'garaje' => $faker->boolean,
                'price' => $faker->numberBetween(100000, 2000000),
                'built_area' => $builtArea,
                'land_area' => $landArea,
            ]);

            $progress->advance();
        }

        $progress->finish();
    }
}
