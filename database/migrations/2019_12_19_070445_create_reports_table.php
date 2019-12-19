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
            $table->bigIncrements('id');
            $table->string('installer')->nullable(true);
            $table->string('inspected_by')->nullable(true);
            $table->string('personnel')->nullable(true);
            $table->string('t_fabrication')->nullable(true);
            $table->string('t_profile')->nullable(true);
            $table->string('no_screws')->nullable(true);
            $table->string('t_erection')->nullable(true);
            $table->string('t_spacing')->nullable(true);
            $table->string('t_align')->nullable(true);
            $table->string('t_anchor')->nullable(true);
            $table->string('c_details')->nullable(true);
            $table->string('b_details')->nullable(true);
            $table->string('brc_bcb')->nullable(true);
            $table->string('wr_wb')->nullable(true);
            $table->string('tcb')->nullable(true);
            $table->string('w_stiffener')->nullable(true);
            $table->string('w_beam')->nullable(true);
            $table->string('t_brace')->nullable(true);
            $table->string('p_fascia')->nullable(true);
            $table->string('p_spacing')->nullable(true);
            $table->string('f_fixing')->nullable(true);
            $table->string('f_alignment')->nullable(true);
            $table->string('r_cover')->nullable(true);
            $table->string('c_type')->nullable(true);
            $table->string('f_spacing')->nullable(true);
            $table->string('v_ridges')->nullable(true);
            $table->string('w_flashing')->nullable(true);
            $table->string('s_touch')->nullable(true);
            $table->longText('comments')->nullable(true);
            $table->string('prepared_by')->nullable(true);
            $table->string('confirmed_by')->nullable(true);
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('reports');
    }
}
