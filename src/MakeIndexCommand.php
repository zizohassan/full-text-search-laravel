<?php

namespace AdvanceSearch\AdvanceSearchProvider;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MakeIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:table {table} {fields}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Index to table ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Developed by the 5dmat-web.com team ");
        $this->info("Please Wait ...");
        $this->info("Indexing fields ".$this->argument('fields')." in table ".$this->argument('table')."  ...");
        DB::statement("ALTER TABLE {$this->argument('table')}  ADD FULLTEXT ({$this->argument('fields')})");
        $this->info("Done, Enjoy!");
        return;
    }
}
