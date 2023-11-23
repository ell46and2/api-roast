<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table): void {
            $table->id();
            $table->string('name')->unique();
            $table->text('header_image_url')->nullable();
            $table->text('logo_url')->nullable();
            $table->string('slug')->unique();
            $table->integer('roaster');
            $table->integer('subscription');
            $table->text('description')->nullable();
            $table->text('website')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('province')->nullable();
            $table->string('territory')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();

            $table->foreignId('added_by')->index()->constrained('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
