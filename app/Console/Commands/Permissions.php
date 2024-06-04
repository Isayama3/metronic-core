<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Permissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE table permissions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        // DB::statement('TRUNCATE TABLE permissions CASCADE');

        $base_path = app_path() . '/Http/Controllers/Admin';
        foreach (glob($base_path . '/*/Permissions.php') as $file) {
            require_once $file;
        }

        $role = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'admin']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $admin = Admin::first();
        $admin->assignRole('super_admin');
    }
}
