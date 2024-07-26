<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableForProductRelation extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('product_names');
            $table->unsignedBigInteger('product_id')->nullable()->after('email');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->json('product_names')->nullable()->after('email');
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
}