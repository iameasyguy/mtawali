@extends('layouts.app', ['activePage' => 'report-management', 'titlePage' => __('Reports Management')])
@section('content')
    <div class="content" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                        <div class="card ">
                            <div class="card-header card-header-primary">


                                <h4 class="card-title">{{ __('View Report') }}</h4>
                                <p class="card-category"></p>

                            </div>
                            <div class="card-body ">


                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('reports.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2><u>Site Inspection Report</u></h2>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">

                                            <div class="card-body">
                                               <div class="row">
                                                   <div class="col-md-4 col-lg-4 col-xl-4"></div>
                                                   <div class="col-md-4 col-lg-4 col-xl-4">
                                                       <div class="table-responsive">
                                                           <table class="table-bordered table-responsive">
                                                               <tbody>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Client Name</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->project->client}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Project Name</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->project->name}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Project No.</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>  {{$report->project->id}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Site Location</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->project->area}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Project Installer</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->installer}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Inspection Date</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->created_at->toFormattedDateString()}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Inspected By:</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       <p>{{$report->inspected_by}}</p>
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <td valign="top" width="24.416135881104033%">
                                                                       <p>Personnel On Site</p>
                                                                   </td>
                                                                   <td colspan="2" valign="top" width="75.58386411889596%">
                                                                       @if($report->personnel!="")
                                                                           {{str_replace(","," ",$report->personnel)}}
                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               </tbody>
                                                           </table>

                                                       </div>
                                                   </div>
                                                   <div class="col-md-4 col-lg-4 col-xl-4"></div>
                                               </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-2 col-lg-2 col-xl-2"></div>
                                                    <div class="col-md-9 col-lg-9 col-xl-9">
                                                        <div class="table-responsive">
                                                            <table class="table-bordered" border="1" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                       <p class="text-center font-weight-bold">1.</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="font-weight-bold">Truss Fabrication</p>
                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_fabrication}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">

                                                                            <p class="text-center font-weight-bold">i.&nbsp;Truss Profile</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_profile}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;No of Screws</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->no_screws}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p class="text-center font-weight-bold">2.</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="font-weight-bold">Truss Erection</p>
                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_erection}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">i.&nbsp;Truss spacing</p>


                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_spacing}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;Truss alignment</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_align}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iii.&nbsp;Truss anchorage</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_anchor}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iv.&nbsp;Connections Details</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->c_details}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p class="text-center font-weight-bold">3.</p>

                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="font-weight-bold">Bracing Details</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->b_details}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">i.&nbsp;BCR &amp; BCB</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->brc_bcb}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;WR&amp;WB</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->wr_wb}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iii.&nbsp;TCB</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->tcb}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iv.&nbsp;Web stiffeners</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->w_stiffener}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">v.&nbsp;Wind beams</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->w_beam}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">vi.&nbsp;T-Brace</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->t_brace}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p class="text-center font-weight-bold">4.</p>

                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="font-weight-bold">Purlins &amp; Fascia</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->p_fascia}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">i.&nbsp;Purlins spacing</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->p_spacing}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;Fascia Cleat fixing</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->f_fixing}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iii.&nbsp;Fascia Board alignment</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->f_alignment}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p class="text-center font-weight-bold">5.</p>

                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="font-weight-bold">Roof cover</p>


                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->r_cover}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;Cover type</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->c_type}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">ii.&nbsp;Fastener spacing</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->f_spacing}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iii.&nbsp;Valleys &amp; Ridges</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->v_ridges}}</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">iv.	Wall flashings</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->w_flashing}}&nbsp;</em></p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" width="5.084745762711864%">
                                                                        <p>&nbsp;</p>
                                                                    </td>
                                                                    <td valign="top" width="34.110169491525426%">
                                                                        <p class="text-center font-weight-bold">v.&nbsp;Screw touch-up</p>

                                                                    </td>
                                                                    <td valign="top" width="60.80508474576271%">
                                                                        <p><em>{{$report->s_touch}}</em></p>
                                                                    </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md- col-lg-4 col-xl-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="card-footer ml-auto mr-auto">

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection
