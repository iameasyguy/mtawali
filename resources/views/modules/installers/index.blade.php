@extends('layouts.app', ['activePage' => 'pi-management', 'titlePage' => __('Project Installers Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $installers->total() }}Project {{str_plural(' Installer',$installers->count())}}</h4>
                            <p class="card-category"> {{ __('Here you can manage Project Installers(Companies not individuals,for the latter use personnel)') }}</p>
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
                                    @can('add_installers')
                                        <a href="{{ route('installers.create') }}" class="btn btn-sm btn-primary">{{ __('Add Installer') }}</a>
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
                                        {{ __('Address') }}
                                    </th>
                                    <th>
                                        {{ __('Phone number') }}
                                    </th>
                                    
                                    <th>
                                        {{ __('Added by') }}
                                    </th>
                                    <th class="text-right">
                                        @can('edit_installers','delete_installers')
                                            {{ __('Actions') }}
                                        @endcan
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if($installers->total()>0)
                                        @foreach($installers as $index=>$installer)
                                            <tr>
                                                <td>
                                                    <strong>{{ $index+1 }}.</strong>
                                                </td>
                                                <td>
                                                    {{ $installer->name }}
                                                </td>
                                                <td>
                                                    {{ $installer->address }}
                                                </td>

                                                <td>
                                                    {{ $installer->phone }}
                                                </td>

                                                <td>
                                                    {{ $installer->added_by }}
                                                </td>
                                                <td class="td-actions text-right">
                                                    {{--                              @include('shared._actions', ['entity' => 'installers','id'=>$installer->id])--}}

                                                    <form action="{{ route('installers.destroy', $installer) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        @can('edit_installers')
                                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('installers.edit', $installer) }}" data-original-title="" title="">
                                                                <i class="material-icons">edit</i>
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        @endcan
                                                        @can('delete_installers')
                                                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                        @endcan
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                        {{$installers->links()}}
                                    @else
                                        <td>
                                            <p>No installers created at the moment</p>
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
