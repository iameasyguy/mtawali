<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->nullable();
            $table->string('installer')->nullable();
            $table->string('inspected_by')->nullable();
            $table->string('personnel')->nullable();
            $table->string('t_fabrication')->nullable();
            $table->string('t_profile')->nullable();
            $table->string('no_screws')->nullable();
            $table->string('t_erection')->nullable();
            $table->string('t_spacing')->nullable();
            $table->string('t_align')->nullable();
            $table->string('t_anchor')->nullable();
            $table->string('c_details')->nullable();
            $table->string('b_details')->nullable();
            $table->string('brc_bcb')->nullable();
            $table->string('wr_wb')->nullable();
            $table->string('tcb')->nullable();
            $table->string('w_stiffener')->nullable();
            $table->string('w_beam')->nullable();
            $table->string('t_brace')->nullable();
            $table->string('p_fascia')->nullable();
            $table->string('p_spacing')->nullable();
            $table->string('f_fixing')->nullable();
            $table->string('f_alignment')->nullable();
            $table->string('r_cover')->nullable();
            $table->string('c_type')->nullable();
            $table->string('f_spacing')->nullable();
            $table->string('v_ridges')->nullable();
            $table->string('w_flashing')->nullable();
            $table->string('s_touch')->nullable();
            $table->longText('comments')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('confirmed_by')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
