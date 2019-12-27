@extends('layouts.app', ['activePage' => 'project-management', 'titlePage' => __('Projects Management')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" id="project_form" action="{{route('projects.update',$project)}}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">



                                <h4 class="card-title">{{ __('Edit project') }}</h4>
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
                                                   placeholder="{{ __('Project Name') }}" value="{{ old('name',$project->name) }}"
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
                                                <option value="{{$project->client}}">{{$project->client}}</option>
                                                @foreach ($clients as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Site location') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('area') ? ' has-danger' : '' }}">
                                            <select name="area" id="area" class="form-control input-lg dynamic" data-dependent="area">
                                                <option value="{{$project->area}}">{{$project->area}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit"  class="btn btn-primary">{{ __('Update project') }}</button>
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
            jQuery('select[name="client"]').on('change',function(){
                var county = jQuery(this).val();
                console.log(county);
                if(county)
                {
                    jQuery.ajax({
                        url : '../area/' +county,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                            // console.log(data);
                            jQuery('select[name="area"]').empty();
                            jQuery.each(data, function(key,value){
                                $('select[name="area"]').append('<option value="'+ value +'">'+ value +'</option>');
                            });
                        }
                    });
                }
                else
                {
                    $('select[name="area"]').empty();
                }
            });

        });



    </script>
@endsection
