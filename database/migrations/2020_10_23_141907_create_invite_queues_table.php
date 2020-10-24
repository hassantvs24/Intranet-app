<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('primary_contact')->comment('Assign Admin id as Primary contact');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('status',['Invited', 'Not Invite', 'Registered'])->default('Not Invite');
            $table->bigInteger('creator_id')->nullable();
            $table->bigInteger('sender_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('invite_queues');
    }
}
