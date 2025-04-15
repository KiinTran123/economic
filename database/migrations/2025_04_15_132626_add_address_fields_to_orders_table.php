<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('province_code')->nullable()->after('user_id');
            $table->string('district_code')->nullable()->after('province_code');
            $table->string('ward_code')->nullable()->after('district_code');
            $table->string('address_detail')->nullable()->after('ward_code');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['province_code', 'district_code', 'ward_code', 'address_detail']);
        });
    }
}
