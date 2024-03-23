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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('utype')->default('USR')->comment('ADM for Admin, ROLE_ADM for Role Admin, USR for User');
            $table->boolean('categories')->default(false);
            $table->boolean('brands')->default(false);
            $table->boolean('products')->default(false);
            $table->boolean('pickup_points')->default(false);
            $table->boolean('warehouses')->default(false);
            $table->boolean('home_slider')->default(false);
            $table->boolean('sale_setting')->default(false);
            $table->boolean('offers')->default(false);
            $table->boolean('orders')->default(false);
            $table->boolean('return_orders')->default(false);
            $table->boolean('blog_categories')->default(false);
            $table->boolean('blogs')->default(false);
            $table->boolean('user_role')->default(false);
            $table->boolean('contact_messages')->default(false);
            $table->boolean('product_questions')->default(false);
            $table->boolean('tickets')->default(false);
            $table->boolean('all_reports')->default(false);
            $table->boolean('settings')->default(false);
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
        Schema::dropIfExists('users');
    }
};
