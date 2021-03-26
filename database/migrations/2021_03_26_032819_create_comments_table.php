<?php

use App\Constants\DatabaseTableConstant;
use App\Constants\StatusConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(DatabaseTableConstant::COMMENTS, function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(StatusConstant::ACTIVE);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->dateTime('deleted_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); // Nullable as we did not create User entity
            $table->unsignedBigInteger('post_id')->nullable(); // Nullable as we did not create Post entity
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('username');
            $table->text('message');
        });

        Schema::table(DatabaseTableConstant::COMMENTS, function (Blueprint $table) {
            $table->foreign('parent_id')
                ->references('id')
                ->on(DatabaseTableConstant::COMMENTS)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists(DatabaseTableConstant::COMMENTS);
    }
}
