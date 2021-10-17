<?php

namespace giustiziapredittiva\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in '
            . 'the file app/Console/Comands/MigrateInOrder.php \n Drop all the '
            . 'table in db before execute the command.';

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
        /** Specify the names of the migrations files in the order you want to 
        * loaded
        * $migrations =[ 
        *               'xxxx_xx_xx_000000_create_nameTable_table.php',
        *    ];
        */
        
        $migrations = [ 
            '2014_10_12_000000_create_users_table.php',
            '2014_10_12_100000_create_password_resets_table.php',
            '2020_08_18_164743_create_keyword_table.php',
            '2020_08_18_164752_create_sentenza_table.php',
            '2020_08_18_164753_create_keyword_sentenza_table.php',
            '2020_08_18_164759_create_categoria_table.php',
            '2020_08_18_165838_create_predizione_table.php'
        ];

        foreach($migrations as $migration)
        {
           $basePath = 'database/migrations/';          
           $migrationName = trim($migration);
           $path = $basePath.$migrationName;
           $this->call('migrate', [
            '--path' => $path ,            
           ]);
        }
    }
}
