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
                                                   <div class="col-md-3 col-lg-3 col-xl-3"></div>
                                                   <div class="col-md-6 col-lg-6 col-xl-6">
                                                       <div class="table-responsive">
                                                           <table class="table align-content-center">

                                                               <tbody>
                                                               <tr>
                                                                   <td class="text-primary">
                                                                       Client Name
                                                                   </td>
                                                                   <td>
                                                                       {{$report->project->client}}
                                                                   </td>



                                                               </tr>
                                                               <tr>

                                                                   <td class="text-primary">
                                                                       Project Name
                                                                   </td>
                                                                   <td>
                                                                       {{$report->project->name}}
                                                                   </td>



                                                               </tr>
                                                               <tr>

                                                                   <td class="text-primary">
                                                                       Project No.
                                                                   </td>
                                                                   <td>
                                                                       {{$report->project->id}}
                                                                   </td>



                                                               </tr>
                                                               <tr>

                                                                   <td class="text-primary">
                                                                       Site Location
                                                                   </td>
                                                                   <td>
                                                                       {{$report->project->area}}
                                                                   </td>



                                                               </tr>

                                                               </tbody>
                                                           </table>
                                                       </div>
                                                   </div>

                                                   <div class="col-md-3 col-lg-3 col-xl-6"></div>
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
