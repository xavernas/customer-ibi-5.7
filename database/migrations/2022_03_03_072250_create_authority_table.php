<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('authority');
            // $table->timestamps()->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable()->useCurrentOnUpdate();
        });

        // Insert some stuff
        DB::table('authorities')->insert(
            [
                [
                    'authority' => 'Superadmin'
                ],
                [
                    'authority' => 'Admin'
                ],
                [
                    'authority' => 'Supervisor'
                ],
                [
                    'authority' => 'Outlet'
                ]
            ]
        );
        // Superadmin   : Untuk Evata 0.1
        // Admin        : Untuk Evata 0.1
        // Supervisor   : Untuk SATA
        // Outlet       : Untuk Outlet
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorities');
    }
}
