<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('company_name');
            $table->string('address');
            $table->string('contact'); // Menyimpan kontak merchant
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('merchants');
    }
}
