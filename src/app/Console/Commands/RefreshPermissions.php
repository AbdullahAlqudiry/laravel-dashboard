<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class RefreshPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync required default roles for app';

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
        Role::syncDefaultPermissions();
    }
}
