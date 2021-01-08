<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class RefreshPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::syncDefaultPermissions();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
