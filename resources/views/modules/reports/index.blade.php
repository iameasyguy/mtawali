@extends('layouts.app', ['activePage' => 'report-management', 'titlePage' => __('Reports Management')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $reports->total() }} {{str_plural('Report',$reports->count())}}</h4>
                            <p class="card-category"> {{ __('Here you can manage reports)') }}</p>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12 text-right">
                                    @can('add_reports')
                                        <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">{{ __('Add Report') }}</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="exampl">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('#') }}
                                    </th>
                                    <th>
                                        {{ __('Project name') }}
                                    </th>

                                    <th>
                                        {{ __('Client name') }}
                                    </th>
                                    <th>
                                        {{ __('Site Location') }}
                                    </th>
                                    <th>
                                        {{ __('Project Installer') }}
                                    </th>
                                    <th>
                                        {{ __('Inspected by') }}
                                    </th>
                                    <th>
                                        {{ __('Confirmed by') }}
                                    </th>
                                    <th>
                                        {{ __('Status') }}
                                    </th>

                                    <th class="text-right">
                                        @can('edit_reports','delete_reports')
                                            {{ __('Actions') }}
                                        @endcan
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if($reports->total()>0)
                                        @foreach($reports as $index=>$project)
                                            <tr>
                                                <td>
                                                    <strong>{{ $index+1 }}.</strong>
                                                </td>
                                                <td>
                                                    {{ $project->project->name }}
                                                </td>


                                                <td>
                                                    {{ $project->project->client }}
                                                </td>
                                                <td>
                                                    {{ $project->project->area }}
                                                </td>
                                                <td>
                                                    {{ $project->installer }}
                                                </td>
                                                <td>
                                                    {{ $project->prepared_by }}
                                                </td>
                                                <td>
                                                    {{ $project->installer }}
                                                </td>
                                                <td>

                                                    @if($project->status=='on')
                                                        <span class="badge badge-pill badge-danger">On going</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning">Closed</span>


                                                    @endif

                                                </td>


                                                <td class="td-actions text-right">
                                                    {{--                              @include('shared._actions', ['entity' => 'reports','id'=>$project->id])--}}

                                                    <form action="{{ route('reports.destroy', $project) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @can('view_reports')
                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('reports.show', $project) }}" data-original-title="" title="view report">
                                                            <i class="material-icons">description</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        @endcan
                                                        @can('edit_reports')
                                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('reports.edit', $project) }}" data-original-title="" title="edit report">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        @endcan
                                                        @can('delete_reports')
                                                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="delete report" onclick="confirm('{{ __("Are you sure you want to delete this report?") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        @endcan
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                        {{$reports->links()}}
                                    @else
                                        <td>
                                            <p>No reports created at the moment</p>
                                        </td>
                                    @endif
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
        } );
    </script>
@endsection
