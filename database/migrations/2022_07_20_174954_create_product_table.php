<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('base_price');
            $table->float('discount_price')->nullable();
            $table->text('description');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
