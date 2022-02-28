<?php



use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use RefineriaWeb\RWRealEstate\Models\Agent;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class AgentsSeeder
 * @package RefineriaWeb\RWRealEstate\Database\Seeds
 */
class AgentsSeeder extends Seeder
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
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $email = strtolower($firstName) . "." . strtolower($lastName) . "@email-example.com" ;

            Agent::updateOrCreate([
                'name' => $firstName,
                'surname' => $lastName,
                'email' => $email,
                'mobile' => $faker->phoneNumber,
            ]);
            
            $progress->advance();
        }

        $progress->finish();
    }
}
