<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Contact;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->string('phone_number');
            $table->string('email');
            $table->string('website');
            $table->foreignId('author_id');
            $table->timestamps();
        });

        $a = new Contact();
        $a->phone_number = "123456789";
        $a->email = "luka@gmail.com";
        $a->website = "www.luka.com";
        $a->author_id = 1;
        $a->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
