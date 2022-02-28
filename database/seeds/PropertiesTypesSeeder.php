<?php


use Illuminate\Database\Seeder;
use RefineriaWeb\RWRealEstate\Models\PropertyType;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class PropertiesTypesSeeder
 * @package RefineriaWeb\RWRealEstate\Database\Seeds
 */
class PropertiesTypesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            ['id' => 1, 'type' => 'Semi Detached House'],
            ['id' => 2, 'type' => 'Apartment'],
            ['id' => 3, 'type' => 'Villa - Chalet'],
            ['id' => 4, 'type' => 'Cottage'],
            ['id' => 5, 'type' => 'Commercial'],
            ['id' => 6, 'type' => 'Plot'],
        ];

        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, count($rows));
        $progress->start();

        foreach ($rows as $row) {
            PropertyType::updateOrCreate($row);

            $progress->advance();
        }

        $progress->finish();
    }
}
