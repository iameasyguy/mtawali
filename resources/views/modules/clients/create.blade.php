@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Client Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="" id="client_form" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">



                                <h4 class="card-title">{{ __('Add Client') }}</h4>
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
                                        <a href="{{ route('clients.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Client Name') }}" value="{{ old('name') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" value="{{ old('email') }}" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Contact Person') }}</label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group{{ $errors->has('contact_person') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('contact_person') ? ' is-invalid' : '' }}"
                                                name="contact_person" id="input-contact_person" type="text"
                                                placeholder="{{ __('Contact Person') }}"
                                                value="{{ old('contact_person') }}" required/>
                                            @if ($errors->has('contact_person'))
                                                <span id="contact_person-error" class="error text-danger"
                                                      for="input-contact_person">{{ $errors->first('contact_person') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone" id="input-phone" type="text"
                                                   placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}"
                                                   required/>
                                            @if ($errors->has('phone'))
                                                <span id="phone-error" class="error text-danger"
                                                      for="input-phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('County') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('county') ? ' has-danger' : '' }}">
                                            <select name="county" id="county" class="form-control input-lg dynamic"
                                                    data-dependent="county">
                                                <option value="">Select County</option>
                                                @foreach ($counties as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Sub County') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('sub_county') ? ' has-danger' : '' }}">
                                            <select name="sub_county" id="sub_county" class="form-control input-lg dynamic" data-dependent="sub_county">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Area/Road') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('area') ? ' is-invalid' : '' }}"
                                                   name="area" id="input-area" type="text"
                                                   placeholder="{{ __('Area e.g Mwiki rd near the hospital') }}" value="{{ old('area') }}"
                                                   required/>
                                            @if ($errors->has('area'))
                                                <span id="area-error" class="error text-danger"
                                                      for="input-area">{{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" id="add_client" class="btn btn-primary">{{ __('Add Client') }}</button>
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
            jQuery('select[name="county"]').on('change',function(){
                var county = jQuery(this).val();
                console.log(county);
                if(county)
                {
                    jQuery.ajax({
                        url : 'sub_counties/' +county,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            console.log(data);
                            jQuery('select[name="sub_county"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="sub_county"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="sub_county"]').empty();
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
                        console.log(data);
                        jQuery.each(data.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>'+value+'</p>');
                            console.log(value);
                            console.log(key);
                        });


                    },
                    complete:function (event, request, settings) {
                        window.location.href ='{{route('clients.index')}}';
                    }
                });

            });
        });



    </script>
@endsection
