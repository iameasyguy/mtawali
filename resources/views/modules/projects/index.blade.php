@extends('layouts.app', ['activePage' => 'project-management', 'titlePage' => __('Project Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $projects->total() }} {{str_plural('Project',$projects->count())}}</h4>
                            <p class="card-category"> {{ __('Here you can manage projects)') }}</p>
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
                                    @can('add_projects')
                                        <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">{{ __('Add Personnel') }}</a>
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
                                        {{ __('Site location') }}
                                    </th>
                                    <th>
                                        {{ __('Status') }}
                                    </th>
                                    <th>
                                        {{ __('Created by') }}
                                    </th>
                                    <th class="text-right">
                                        @can('edit_projects','delete_projects')
                                            {{ __('Actions') }}
                                        @endcan
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if($projects->total()>0)
                                        @foreach($projects as $index=>$project)
                                            <tr>
                                                <td>
                                                    <strong>{{ $index+1 }}.</strong>
                                                </td>
                                                <td>
                                                    {{ $project->name }}
                                                </td>


                                                <td>
                                                    {{ $project->client }}
                                                </td>
                                                <td>
                                                    {{ $project->area }}
                                                </td>

                                                <td>
                                                    @if($project->status==1)
                                                        <span class="badge badge-pill badge-danger">Pending</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning">Closed</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    {{ $project->added_by }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    {{--                              @include('shared._actions', ['entity' => 'projects','id'=>$project->id])--}}

                                                    <form action="{{ route('projects.destroy', $project) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @can('edit_projects')
                                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('projects.edit', $project) }}" data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        @endcan
                                                        @can('delete_projects')
                                                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        @endcan
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                        {{$projects->links()}}
                                    @else
                                        <td>
                                            <p>No projects created at the moment</p>
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
