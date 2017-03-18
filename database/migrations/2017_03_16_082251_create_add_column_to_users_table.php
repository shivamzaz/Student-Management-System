<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('password')->nullable()->change();
            $table->string('api_token', 100)->nullable();
            $table->timestamp('api_token_expired_at')->nullable();
            $table->string('status_id')->default(0);
            $table->string('verify_hash', 100)->nullable();
            $table->timestamp('verify_hash_expired_at')->nullable();
            $table->unique(['api_token', 'verify_hash'],'unique_index');
            $table->string('forgot_password_hash')->nullable();
            $table->timestamp('forgot_password_hash_expired_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //        $table->dropColumn('api_token');
        $table->dropColumn('status_id');
        $table->dropColumn('api_token');
        $table->dropColumn('api_token_expired_at');
        $table->dropColumn('verify_hash');
        $table->dropColumn('verify_hash_expired_at');
        $table->dropColumn('forgot_password_hash');
        $table->dropColumn('forgot_password_hash_expired_at');

        });
    }
}
