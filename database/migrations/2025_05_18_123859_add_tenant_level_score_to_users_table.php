<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('tenant_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->after('tenant_id')->constrained('levels');
            $table->integer('score')->default(0)->after('level_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropForeign(['level_id']);
            $table->dropColumn(['tenant_id', 'level_id', 'score']);
        });
    }
};
