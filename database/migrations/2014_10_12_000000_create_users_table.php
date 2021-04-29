<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // مخصصة لتوجهية قاعدة البيانات عند تشغيل أمر التهجير
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();        /*  nullableفريد اي مايتكرر  */
            $table->string('password');
            $table->rememberToken();         // تذكر كلمة المرور 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()            // تراجع عن تهجير الجدول وحذفة من قاعدة البيانات عند اجراء اي تعديل
    {
        Schema::dropIfExists('users');
    }
}
