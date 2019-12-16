@extends('layouts.app', ['activePage' => 'personnel-management', 'titlePage' => __('Project personnel Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post"  action="{{route('personels.update',$personel)}}" autocomplete="off"
                          class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">



                                <h4 class="card-title">{{ __('Edit Personnel') }}</h4>
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
                                        <a href="{{ route('personels.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Installer Name') }}" value="{{ old('name',$personel->name) }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
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
                                                   placeholder="{{ __('Phone Number') }}" value="{{ old('phone',$personel->phone) }}"
                                                   required/>
                                            @if ($errors->has('phone'))
                                                <span id="phone-error" class="error text-danger"
                                                      for="input-phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Skills status ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('skilled') ? ' has-danger' : '' }}">
                                            @if($personel->skilled==true)
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" name="skilled" id="skilled" checked="">
                                                        <span class="toggle"></span>
                                                        Skilled
                                                    </label>
                                                </div>
                                            @else
                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" name="skilled" id="skilled">
                                                        <span class="toggle"></span>
                                                        Skilled
                                                    </label>
                                                </div>
                                            @endif
                                            @if ($errors->has('skilled'))
                                                <span id="skilled-error" class="error text-danger" for="input-skilled">{{ $errors->first('skilled') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit"  class="btn btn-primary">{{ __('Update Personnel') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
