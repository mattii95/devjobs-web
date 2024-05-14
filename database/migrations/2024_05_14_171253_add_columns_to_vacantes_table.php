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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salario_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categoria_id')->constrained()->cascadeOnDelete();
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('description');
            $table->string('image');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');
            $table->dropColumn([
                'title',
                'salario_id',
                'categoria_id',
                'empresa',
                'ultimo_dia',
                'description',
                'image',
                'publicado',
                'user_id'
            ]);
        });
    }
};
