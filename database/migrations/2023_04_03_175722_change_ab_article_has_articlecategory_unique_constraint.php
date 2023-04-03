<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ab_article_has_articlecategory',function (Blueprint $table) {
            $table->dropUnique('ab_article_has_articlecategory_ab_articlecategory_id_unique');
            $table->dropUnique('ab_article_has_articlecategory_ab_article_id_unique');
            $table->unique(['ab_articlecategory_id','ab_article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
