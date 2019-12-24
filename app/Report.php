<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable =['project_id','installer','inspected_by','personnel','t_fabrication','t_profile','no_screws',
        't_erection','t_spacing','t_align','t_anchor','c_details','b_details','brc_bcb','wr_wb',
        'tcb','w_stiffener','w_beam','t_brace','p_fascia','p_spacing','f_fixing','f_alignment',
        'r_cover','c_type','f_spacing','v_ridges','w_flashing','s_touch','comments','prepared_by','confirmed_by','status','filename'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
