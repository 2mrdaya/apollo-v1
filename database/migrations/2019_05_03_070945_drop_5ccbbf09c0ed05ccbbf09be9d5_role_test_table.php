<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5ccbbf09c0ed05ccbbf09be9d5RoleTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('role_test');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('role_test')) {
            Schema::create('role_test', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id', 'fk_p_295767_295778_test_r_5cc5781c49cf2')->references('id')->on('roles');
                $table->integer('test_id')->unsigned()->nullable();
            $table->foreign('test_id', 'fk_p_295778_295767_role_t_5cc5781c4a7c6')->references('id')->on('tests');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
