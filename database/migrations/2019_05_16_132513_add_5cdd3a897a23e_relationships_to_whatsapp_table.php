<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cdd3a897a23eRelationshipsToWhatsappTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whatsapps', function(Blueprint $table) {
            if (!Schema::hasColumn('whatsapps', 'uhid_id')) {
                $table->integer('uhid_id')->unsigned()->nullable();
                $table->foreign('uhid_id', '300011_5ccbbece29ad9')->references('id')->on('patient_registrations')->onDelete('cascade');
                }
                if (!Schema::hasColumn('whatsapps', 'avid_id')) {
                $table->integer('avid_id')->unsigned()->nullable();
                $table->foreign('avid_id', '300011_5cdd3a85d6d8c')->references('id')->on('avips')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whatsapps', function(Blueprint $table) {
            
        });
    }
}
