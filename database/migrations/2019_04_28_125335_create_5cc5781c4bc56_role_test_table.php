<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5cc5781c4bc56RoleTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('role_test')) {
            Schema::create('role_test', function (Blueprint $table) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_295767_295778_test_r_5cc5781c4bd7d')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', 'fk_p_295778_295767_role_t_5cc5781c4be4a')->references('id')->on('tests')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_test');
    }
}
