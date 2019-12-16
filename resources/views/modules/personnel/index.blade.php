@extends('layouts.app', ['activePage' => 'personnel-management', 'titlePage' => __('Project personnel Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $personels->total() }} {{str_plural('Personnel',$personels->count())}}</h4>
                            <p class="card-category"> {{ __('Here you can manage Hired Personnel(Individuals not Companies,for the latter use personels mngt)') }}</p>
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
                                    @can('add_personels')
                                        <a href="{{ route('personels.create') }}" class="btn btn-sm btn-primary">{{ __('Add Personnel') }}</a>
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
                                        {{ __('Name') }}
                                    </th>
                                    
                                    <th>
                                        {{ __('Phone number') }}
                                    </th>
                                    <th>
                                        {{ __('Skills Status') }}
                                    </th>
                                    <th>
                                        {{ __('Added by') }}
                                    </th>
                                    <th class="text-right">
                                        @can('edit_personels','delete_personels')
                                            {{ __('Actions') }}
                                        @endcan
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if($personels->total()>0)
                                        @foreach($personels as $index=>$personel)
                                            <tr>
                                                <td>
                                                    <strong>{{ $index+1 }}.</strong>
                                                </td>
                                                <td>
                                                    {{ $personel->name }}
                                                </td>


                                                <td>
                                                    {{ $personel->phone }}
                                                </td>

                                                <td>
                                                    @if($personel->skilled==1)
                                                        <span class="badge badge-pill badge-danger">Skilled</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning">Un-Skilled</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    {{ $personel->added_by }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    {{--                              @include('shared._actions', ['entity' => 'personels','id'=>$personel->id])--}}

                                                    <form action="{{ route('personels.destroy', $personel) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @can('edit_personels')
                                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('personels.edit', $personel) }}" data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        @endcan
                                                        @can('delete_personels')
                                                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        @endcan
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                        {{$personels->links()}}
                                    @else
                                        <td>
                                            <p>No personels created at the moment</p>
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
