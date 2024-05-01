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
        $tableName = 'saunas';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('name')->comment('名称');
            $table->text('comment')->comment('コメント');
            $table->string('bath')->comment('水風呂評価');
            $table->string('sauna')->comment('サウナ評価');
            $table->string('outdoor')->comment('外気浴評価');
            $table->string('evaluation')->comment('総合評価');
            $table->string('img_path')->comment('画像');
            $table->softDeletes()->comment('削除日時');
            $table->timestamp('created_at')->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });
        // Illuminate\Support\Facades\DB
        DB::statement("ALTER TABLE {$tableName} COMMENT 'サウナ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saunas');
    }
};
