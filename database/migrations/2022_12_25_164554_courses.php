<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Courses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id');
            $table->string('title');
            $table->text('course_requirements');
            $table->text('course_description');
            $table->text('status');
            $table->string('category')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('level')->nullable();
            $table->string('lang')->default('en');
            $table->string('duration')->nullable();
            $table->string('is_free')->nullable();
            $table->string('price')->nullable();
            $table->string('has_discount')->nullable();
            $table->string('discount')->nullable();
            $table->string('featured_course')->nullable();
            $table->string('is_preview')->nullable();
            $table->string('preview_type')->nullable();
            $table->string('preview_content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
