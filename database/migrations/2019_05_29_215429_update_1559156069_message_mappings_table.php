<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1559156069MessageMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_mappings', function (Blueprint $table) {
            if(Schema::hasColumn('message_mappings', 'avid_id')) {
                $table->dropForeign('309584_5ceecceb67f69');
                $table->dropIndex('309584_5ceecceb67f69');
                $table->dropColumn('avid_id');
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
        Schema::table('message_mappings', function (Blueprint $table) {
                        
        });

    }
}
