<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'plans';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name')->comment('名称');
            $table->string('prefecture')->comment('県');
            $table->softDeletes()->comment('削除日時');
            $table->timestamp('created_at')->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });
        // Illuminate\Support\Facades\DB
        DB::statement("ALTER TABLE {$tableName} COMMENT '予定'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
