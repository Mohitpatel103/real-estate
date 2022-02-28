<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use RefineriaWeb\RWRealEstate\Models\Location;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class LocationsSeeder
 * @package RefineriaWeb\RWRealEstate\Database\Seeds
 */
class LocationsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $totalRows = 100;
        $faker = Faker::create();
        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, $totalRows);
        $progress->start();

        for ($i = 0; $i < $totalRows; $i ++) {
            Location::updateOrCreate([
                'name' => $faker->streetName
            ]);

            $progress->advance();
        }

        $progress->finish();
    }
}
