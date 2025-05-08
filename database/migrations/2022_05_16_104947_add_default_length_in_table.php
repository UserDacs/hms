<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        if (Schema::hasColumn('users', 'stripe_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('stripe_id', 100)->change();
            });
        }

        if (Schema::hasColumn('users', 'card_brand')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('card_brand', 100)->change();
            });
        }

        Schema::table('media', function (Blueprint $table) {
            $table->string('model_type', 160)->change();
        });

        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->string('model_type', 160)->change();
        });

        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->string('model_type', 160)->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('model_type', 191)->change(); // Assuming original length was 191
        });
    
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->string('model_type', 191)->change(); // Assuming original length was 191
        });
    
        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->dropUnique(['model_type']); // Remove unique constraint
            $table->string('model_type', 191)->change(); // Revert length
        });
    
        if (Schema::hasColumn('users', 'stripe_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('stripe_id')->change(); // Restore original length (default 255 if unknown)
            });
        }
    
        if (Schema::hasColumn('users', 'card_brand')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('card_brand')->change(); // Restore original length (default 255 if unknown)
            });
        }
    }
};
