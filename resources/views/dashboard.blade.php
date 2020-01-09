@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">account_circle</i>
              </div>
              <p class="card-category">Clients</p>
              <h3 class="card-title">{{$clients}}

              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">input</i>
                <a href="{{route('clients.index')}}">View</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">settings_input_antenna</i>
              </div>
              <p class="card-category">Projects</p>
              <h3 class="card-title">{{$project}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">input</i>
                    <a href="{{route('projects.index')}}">View</a>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Reports</p>
              <h3 class="card-title">{{$reports}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-danger">input</i>
                    <a href="{{route('reports.index')}}">View</a>
                </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Projects</h4>
                    <p class="card-category"> {{ __('Projects per Manager') }}</p>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 text-right">
                            @can('view_projects')
                                <a href="{{ route('projects.index') }}" class="btn btn-sm btn-primary">{{ __('View Projects') }}</a>
                            @endcan
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="exampl">
                            <thead class=" text-primary">
                            <th>{{__('#')}}</th>

                            <th>
                                {{ __('Project Manager') }}
                            </th>



                            <th>
                                {{ __('No of projects') }}
                            </th>

                            </thead>
                            <tbody>

                                @foreach($pms as $index=>$client)
                                    <tr>
                                        <td>
                                            <strong>{{ $index+1 }}.</strong>
                                        </td>

                                        <td>
                                            {{ $client->created_by }}
                                        </td>
                                        <td>
                                            {{ $client->total }}
                                        </td>




                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title ">Reports</h4>
                    <p class="card-category"> {{ __('Reports per Engineer') }}</p>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 text-right">
                            @can('view_reports')
                                <a href="{{ route('reports.index') }}" class="btn btn-sm btn-primary">{{ __('View Reports') }}</a>
                            @endcan
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="examp">
                            <thead class=" text-primary">
                            <th>{{__('#')}}</th>

                            <th>
                                {{ __('Engineer') }}
                            </th>



                            <th>
                                {{ __('No of reports') }}
                            </th>

                            </thead>
                            <tbody>

                            @foreach($rpts as $index=>$client)
                                <tr>
                                    <td>
                                        <strong>{{ $index+1 }}.</strong>
                                    </td>

                                    <td>
                                        {{ $client->prepared_by }}
                                    </td>
                                    <td>
                                        {{ $client->total }}
                                    </td>




                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#exampl').DataTable( {
              "stateSave": true,
              "ordering": true,
              "info":true,
              "paging":   true,
              "pagingType": "full_numbers"
          } );
          $('#examp').DataTable( {
              "stateSave": true,
              "ordering": true,
              "info":true,
              "paging":   true,
              "pagingType": "full_numbers"
          } );
      } );
  </script>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
