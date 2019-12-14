@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Client Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $clients->total() }} {{str_plural('Client',$clients->count())}}</h4>
                            <p class="card-category"> {{ __('Here you can manage clients') }}</p>
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
                                    @can('add_clients')
                                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">{{ __('Add Client') }}</a>
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
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Contact Person') }}
                                    </th>
                                    <th>
                                        {{ __('Phone') }}
                                    </th>
                                    <th>
                                        {{ __('Location') }}
                                    </th>
                                    <th>
                                        {{ __('Added by') }}
                                    </th>
                                    <th class="text-right">
                                        @can('edit_clients','delete_clients')
                                            {{ __('Actions') }}
                                        @endcan
                                    </th>
                                    </thead>
                                    <tbody>
                                   @if($clients->total()>0)
                                       @foreach($clients as $index=>$client)
                                           <tr>
                                               <td>
                                                   <strong>{{ $index+1 }}.</strong>
                                               </td>
                                               <td>
                                                   {{ $client->name }}
                                               </td>
                                               <td>
                                                   {{ $client->email }}
                                               </td>
                                               <td>
                                                   {{ $client->contact_person }}
                                               </td>
                                               <td>
                                                   {{ $client->phone }}
                                               </td>
                                               <td>
                                                   {{ $client->area }}-{{ $client->county }}-{{ $client->sub_county }}
                                               </td>
                                               <td>
                                                   {{ $client->username }}
                                               </td>
                                               <td class="td-actions text-right">
                                                   {{--                              @include('shared._actions', ['entity' => 'clients','id'=>$client->id])--}}

                                                   <form action="{{ route('clients.destroy', $client) }}" method="post">
                                                       @csrf
                                                       @method('delete')
                                                       @can('edit_clients')
                                                           <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('clients.edit', $client) }}" data-original-title="" title="">
                                                               <i class="material-icons">edit</i>
                                                               <div class="ripple-container"></div>
                                                           </a>
                                                       @endcan
                                                       @can('delete_clients')
                                                           <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                               <i class="material-icons">close</i>
                                                               <div class="ripple-container"></div>
                                                           </button>
                                                       @endcan
                                                   </form>

                                               </td>

                                           </tr>
                                       @endforeach
                                       {{$clients->links()}}
                                   @else
                                       <td>
                                           <p>No Clients created at the moment</p>
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
