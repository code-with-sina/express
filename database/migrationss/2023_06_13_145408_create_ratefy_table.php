<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('bank_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->timestamps();
            $table->integer('bank_id');
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->string('longcode')->nullable();
            $table->string('gateway')->nullable();
            $table->enum('active', ['false', 'true'])->default('false');
        });

        Schema::create('blog_social_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bsm_facebook')->nullable();
            $table->string('bsm_instagram')->nullable();
            $table->string('bsm_linkedin')->nullable();
            $table->string('bsm_youtube')->nullable();
            $table->timestamps();
        });

        Schema::create('business_profile', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_id');
            $table->string('logo_path');
            $table->string('business_name');
            $table->string('category');
            $table->text('description');
            $table->string('linkedin');
            $table->string('siteprofiles');
        });

        Schema::create('buyings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->string('wallets');
            $table->integer('available')->default(0);
            $table->double('capacity', 8, 2);
            $table->enum('currency', ['USD', 'GBP', 'EUR']);
            $table->timestamps();
            $table->integer('selling_id');
            $table->string('note')->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name')->nullable();
            $table->integer('ordering')->default(10000);
            $table->timestamps();
        });

        Schema::create('ch_favorites', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('user_id');
            $table->bigInteger('favorite_id');
            $table->timestamps();
        });

        Schema::create('ch_messages', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('type');
            $table->bigInteger('from_id');
            $table->bigInteger('to_id');
            $table->string('body', 5000)->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('seen')->default(false);
            $table->timestamps();
        });

        Schema::create('chat_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id');
            $table->text('history');
            $table->timestamps();
        });

        Schema::create('chat_subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('session_id');
            $table->timestamps();
            $table->enum('status', ['attended', 'attention'])->default('attention');
        });

        Schema::create('exchange_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->string('sub_item', 255);
            $table->string('labels', 255);
            $table->integer('ordering')->default(10000);
            $table->double('percntage', 8, 2);
            $table->integer('active')->default(1);
            $table->timestamps();
            $table->string('image_path');
            $table->string('currency')->nullable();
            $table->text('seller_note')->nullable();
            $table->string('duration_cap')->nullable();
            $table->string('duration')->nullable();
            $table->text('confirmation_note')->nullable();
        });

        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('rate_decimal');
            $table->string('rate_normal');
            $table->string('assets_id_from');
            $table->string('assets_id_to');
            $table->integer('status')->default(2);
            $table->string('compare')->nullable();
            $table->integer('ordering')->default(10000);
            $table->timestamps();
            $table->timestamp('exchange_time')->default('0000-00-00 00:00:00');
        });

        Schema::create('express_payout_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tx_ref');
            $table->string('amount');
            $table->string('bank');
            $table->string('account_number');
            $table->string('recipient_name');
            $table->string('recipient_code');
            $table->string('channel');
            $table->enum('status', ['pending', 'fail', 'success', 'manual_confirmation']);
            $table->timestamps();
            $table->string('session_id');
        });

        Schema::create('express_transaction_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id');
            $table->integer('user_id');
            $table->text('message');
            $table->timestamps();
            $table->integer('sender_id');
            $table->integer('receiver_id');
        });

        Schema::create('express_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->integer('wallet_id')->nullable();
            $table->string('wallet_name');
            $table->string('wallet_currency');
            $table->double('wallet_amount', 8, 2);
            $table->string('conversion_name');
            $table->double('conversion_amount', 8, 2);
            $table->double('conversion_percentage', 8, 2);
            $table->string('seller_name');
            $table->string('seller_bank_name');
            $table->string('seller_account_number');
            $table->string('seller_account_name');
            $table->text('express_binding_detail_note');
            $table->integer('express_binding_detail_duration')->default(15);
            $table->dateTime('express_binding_detail_start_time');
            $table->dateTime('express_binding_detail_end_time');
            $table->integer('express_binding_detail_expires')->default(0);
            $table->integer('seller_recieved_payment_confirmation')->default(0);
            $table->integer('buyer_disbursment_confirmation')->default(0);
            $table->enum('transaction_status', ['processing', 'pending', 'expires', 'success', 'failure', 're_open', 'closed']);
            $table->string('order_id', 255);
            $table->timestamps();
            $table->string('pop_path')->nullable();
            $table->integer('wallet_name_id')->default(0);
            $table->integer('seller_payment_approval')->default(0);
            $table->text('express_binding_confirmatio_note')->nullable();
            $table->integer('pop_confirmation')->default(0);
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('feedback_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->string('question_a');
            $table->string('question_b');
            $table->integer('rates');
            $table->timestamps();
            $table->string('session_id');
        });

        Schema::create('merchant_transaction_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tnx_ref');
            $table->double('amount', 8, 2);
            $table->integer('success')->default(0);
            $table->integer('failure')->default(0);
            $table->string('ratefy_ref');
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('type');
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->index(['notifiable_type', 'notifiable_id']);
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['tokenable_type', 'tokenable_id']);
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('post_title')->nullable();
            $table->string('post_slug')->nullable();
            $table->text('post_content')->nullable();
            $table->text('post_tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->timestamps();
        });

        Schema::create('sell_announcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->string('amount');
            $table->text('description');
            $table->integer('ordering')->default(10000);
            $table->timestamps();
        });

        Schema::create('selling_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seller_id');
            $table->string('payment_type');
            $table->string('full_name');
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::create('set_labels', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('name', 255);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('blog_name')->nullable();
            $table->string('blog_email')->nullable();
            $table->text('blog_description')->nullable();
            $table->string('blog_logo')->nullable();
            $table->string('blog_favicon')->nullable();
            $table->timestamps();
        });

        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subcategory_name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent_category')->nullable();
            $table->integer('ordering')->default(10000);
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->integer('seller_id');
            $table->double('amount', 8, 2);
            $table->double('amount_release', 8, 2);
            $table->string('selling');
            $table->enum('currency', ['NGN', 'USD', 'GBP']);
            $table->integer('start')->default(0);
            $table->integer('end')->default(0);
            $table->integer('hold')->default(0);
            $table->integer('release')->default(0);
            $table->timestamps();
            $table->string('transaction_id');
            $table->text('note_users')->nullable();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('user_profile_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_address');
            $table->string('second_address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postal_code');
            $table->string('country');
            $table->timestamps();
            $table->integer('users_id');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('username')->nullable();
            $table->string('picture')->nullable();
            $table->text('biography')->nullable()->fulltext();
            $table->integer('type')->default(2);
            $table->integer('blocked')->default(0);
            $table->integer('direct_publish')->default(0);
            $table->string('mobile_number')->nullable();
            $table->string('emailcode')->nullable();
            $table->integer('activate')->default(0);
            $table->tinyInteger('active_status')->default(0);
            $table->string('avatar')->default('avatar.png');
            $table->tinyInteger('dark_mode')->default(0);
            $table->string('messenger_color')->default('#2180f3');
        });

        Schema::create('websockets_statistics_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_id');
            $table->integer('peak_connection_count');
            $table->integer('websocket_message_count');
            $table->integer('api_message_count');
            $table->timestamps();
        });

        Schema::create('whatsapp', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_id');
            $table->string('name');
            $table->string('initiated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapp');

        Schema::dropIfExists('websockets_statistics_entries');

        Schema::dropIfExists('users');

        Schema::dropIfExists('user_profile_addresses');

        Schema::dropIfExists('types');

        Schema::dropIfExists('transactions');

        Schema::dropIfExists('sub_categories');

        Schema::dropIfExists('settings');

        Schema::dropIfExists('set_labels');

        Schema::dropIfExists('selling_profiles');

        Schema::dropIfExists('sell_announcements');

        Schema::dropIfExists('posts');

        Schema::dropIfExists('personal_access_tokens');

        Schema::dropIfExists('password_resets');

        Schema::dropIfExists('notifications');

        Schema::dropIfExists('merchant_transaction_activities');

        Schema::dropIfExists('feedback_rates');

        Schema::dropIfExists('failed_jobs');

        Schema::dropIfExists('express_transactions');

        Schema::dropIfExists('express_transaction_chats');

        Schema::dropIfExists('express_payout_histories');

        Schema::dropIfExists('exchange_rates');

        Schema::dropIfExists('exchange_items');

        Schema::dropIfExists('chat_subscriptions');

        Schema::dropIfExists('chat_histories');

        Schema::dropIfExists('ch_messages');

        Schema::dropIfExists('ch_favorites');

        Schema::dropIfExists('categories');

        Schema::dropIfExists('buyings');

        Schema::dropIfExists('business_profile');

        Schema::dropIfExists('blog_social_media');

        Schema::dropIfExists('bank_users');
    }
};
