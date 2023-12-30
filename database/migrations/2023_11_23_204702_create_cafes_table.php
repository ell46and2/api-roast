<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('cafes', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('company_id')->index();

            $table->string('slug');
            $table->string('location_name');
            $table->text('description')->nullable();
            $table->string('primary_image_url')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('province')->nullable();
            $table->string('territory')->nullable();
            $table->string('zip')->nullable();
            $table->decimal('latitude', 11, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafes');
    }
};
