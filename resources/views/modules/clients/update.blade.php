@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Client Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="client_form" action="{{route('clients.update',$client)}}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">



                                <h4 class="card-title">{{ __('Edit Client') }}</h4>
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
                                                   placeholder="{{ __('Client Name') }}" value="{{ old('name',$client->name) }}"
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
                                                   placeholder="{{ __('Email') }}" value="{{ old('email',$client->email) }}" required/>
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
                                                value="{{ old('contact_person',$client->contact_person) }}" required/>
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
                                                   placeholder="{{ __('Phone Number') }}" value="{{ old('phone',$client->phone) }}"
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
                                                <option value="{{$client->county}}">{{$client->county}}</option>
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
                                                <option value="{{$client->sub_county}}">{{$client->sub_county}}</option>
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
                                                   placeholder="{{ __('Area e.g Mwiki rd near the hospital') }}" value="{{ old('area',$client->area) }}"
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
                                <button type="submit"  class="btn btn-primary">{{ __('Update Client') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function ()
        {
            jQuery('select[name="county"]').on('change',function(){
                var county = jQuery(this).val();
                console.log(county);
                if(county)
                {
                    jQuery.ajax({
                        url : '../sub_counties/' +county,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            // console.log(data);
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

        });



    </script>
@endsection
