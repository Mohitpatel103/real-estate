<?php

namespace RefineriaWeb\RWRealEstate\Console\Commands;

use Illuminate\Console\Command;
use RefineriaWeb\RWRealEstate\Database\Seeds\DatabaseSeeder;

/**
 * Class SeedsCommand
 * @package RefineriaWeb\RWRealEstate\Console\Commands
 */
class SeedsCommand extends Command
{
    /**
     * The signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rw-real-estate.tables:seed';

    /**
     * The description of the console command.
     *
     * @var string
     */
    protected $description = 'Seeds for RW Real Estate tables';


    /**
     * Execute the console command.
     *
     * @return void
     *
     */
    public function handle()
    {
        $this->info('Seed RW Real Estate Tables');

        (new DatabaseSeeder())->run();
    }
}
