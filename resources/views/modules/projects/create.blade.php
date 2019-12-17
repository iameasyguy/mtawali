@extends('layouts.app', ['activePage' => 'project-management', 'titlePage' => __('Projects Management')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{route('projects.store')}}"  autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">



                                <h4 class="card-title">{{ __('Add Project') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger" style="display:none"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('projects.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Project Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Name') }}" value="{{ old('name') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('client') ? ' has-danger' : '' }}">
                                            <select name="client" id="client" class="form-control input-lg dynamic"
                                                    data-dependent="client">
                                                <option value="">Select client</option>
                                                @foreach ($clients as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Site Location') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                            <select name="area" id="area" class="form-control input-lg dynamic" data-dependent="area">

                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" id="add_client" class="btn btn-primary">{{ __('Add Installer') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        jQuery(document).ready(function ()
        {
            jQuery('select[name="client"]').on('change',function(){
                var client = jQuery(this).val();
                console.log(client);
                if(client)
                {
                    jQuery.ajax({
                        url : 'area/' +client,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="area"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="area"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="area"]').empty();
                }
            });

            $("#add_client").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    name: jQuery('#input-name').val(),
                    email: jQuery('#input-email').val(),
                    contact_person:jQuery('#input-contact_person').val(),
                    phone:jQuery('#input-phone').val(),
                    county:jQuery('#county').val(),
                    sub_county:jQuery('#sub_county').val(),
                    area:jQuery('#input-area').val(),
                };

                var type = "POST";
                var ajaxurl = '{{route('clients.store')}}';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    success: function (data) {
                        jQuery.each(data.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>'+value+'</p>');
                            console.log(value);
                        });
                        window.location.href ='{{route('clients.index')}}';

                    }
                });

            });
        });



    </script>
@endsection