<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('addres')->nullable();
            $table->string('addres_dua')->nullable();
            $table->integer('provinces_id')->nullable();
            $table->integer('regencies_id')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('shipping_different')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('name')->nullable();
            $table->dropColumn('addres')->nullable();
            $table->dropColumn('addres_dua')->nullable();
            $table->dropColumn('provinces_id')->nullable();
            $table->dropColumn('regencies_id')->nullable();
            $table->dropColumn('zip_code')->nullable();
            $table->dropColumn('phone_number')->nullable();
            $table->dropColumn('shipping_different')->default(false);
        });
    }
};
