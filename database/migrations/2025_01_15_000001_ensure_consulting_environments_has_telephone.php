
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnsureConsultingEnvironmentsHasTelephone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consulting_environments', function (Blueprint $table) {
            if (!Schema::hasColumn('consulting_environments', 'telephone')) {
                $table->string('telephone')->nullable()->after('tema');
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
        Schema::table('consulting_environments', function (Blueprint $table) {
            if (Schema::hasColumn('consulting_environments', 'telephone')) {
                $table->dropColumn('telephone');
            }
        });
    }
}
