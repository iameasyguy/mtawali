@extends('layouts.app', ['activePage' => 'report-management', 'titlePage' => __('Reports Management')])
@section('content')
    <div class="content" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{route('reports.store')}}" autocomplete="off"
                          class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">


                                <h4 class="card-title">{{ __('Add Report') }}</h4>
                                <p class="card-category"></p>

                            </div>
                            <div class="card-body ">
                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">

                                        <strong>Opps!</strong> Something went wrong with your input.

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>
                                    <br>
                                @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger" style="display:none"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('reports.index') }}"
                                           class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Select Project') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('project_id') ? ' has-danger' : '' }}">
                                            <select name="project_id" id="project_id"
                                                    class="form-control input-lg dynamic"
                                                    data-dependent="project_id">
                                                <option value="">Select project</option>
                                                @foreach ($projects as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Select Installer') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('installer') ? ' has-danger' : '' }}">
                                            <select name="installer" id="installer"
                                                    class="form-control input-lg dynamic"
                                                    data-dependent="installer">
                                                <option value="">Select Installer</option>
                                                @foreach ($installers as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Select personnel') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('personnel') ? ' has-danger' : '' }}">
                                            <select multiple name="personnel[]" id="personnel"
                                                    class="form-control input-lg dynamic"
                                                    data-dependent="personnel">
                                                <option value="">Select personnel</option>
                                                @foreach ($personnels as $key => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{--                                ['project_id','installer','inspected_by','personnel','t_fabrication','t_profile','no_screws',--}}
                                {{--                                't_erection','t_spacing','t_align','t_anchor','c_details','b_details','brc_bcb','wr_wb',--}}
                                {{--                                'tcb','w_stiffener','w_beam','t_brace','p_fascia','p_spacing','f_fixing','f_alignment',--}}
                                {{--                                'r_cover','c_type','f_spacing','v_ridges','w_flashing','s_touch','comments','prepared_by','confirmed_by','status'];--}}

                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_fabrication') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_fabrication') ? ' is-invalid' : '' }}"
                                                   name="t_fabrication" id="input-t_fabrication" type="text"
                                                   placeholder="{{ __('Truss Fabrication') }}" value="{{ old('t_fabrication') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_fabrication'))
                                                <span id="t_fabrication-error" class="error text-danger"
                                                      for="input-t_fabrication">{{ $errors->first('t_fabrication') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_profile') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_profile') ? ' is-invalid' : '' }}"
                                                   name="t_profile" id="input-t_profile" type="text"
                                                   placeholder="{{ __('Truss Profile') }}" value="{{ old('t_profile') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_profile'))
                                                <span id="t_profile-error" class="error text-danger"
                                                      for="input-t_profile">{{ $errors->first('t_profile') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('no_screws') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('no_screws') ? ' is-invalid' : '' }}"
                                                   name="no_screws" id="input-no_screws" type="text"
                                                   placeholder="{{ __('No of Screws') }}" value="{{ old('no_screws') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('no_screws'))
                                                <span id="no_screws-error" class="error text-danger"
                                                      for="input-no_screws">{{ $errors->first('no_screws') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_erection') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_erection') ? ' is-invalid' : '' }}"
                                                   name="t_erection" id="input-t_erection" type="text"
                                                   placeholder="{{ __('Truss Erection') }}" value="{{ old('t_erection') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_erection'))
                                                <span id="t_erection-error" class="error text-danger"
                                                      for="input-t_erection">{{ $errors->first('t_erection') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_spacing') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_spacing') ? ' is-invalid' : '' }}"
                                                   name="t_spacing" id="input-t_spacing" type="text"
                                                   placeholder="{{ __('Truss spacing') }}" value="{{ old('t_spacing') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_spacing'))
                                                <span id="t_spacing-error" class="error text-danger"
                                                      for="input-t_spacing">{{ $errors->first('t_spacing') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_align') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_align') ? ' is-invalid' : '' }}"
                                                   name="t_align" id="input-t_align" type="text"
                                                   placeholder="{{ __('Truss alignment') }}" value="{{ old('t_align') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_align'))
                                                <span id="t_align-error" class="error text-danger"
                                                      for="input-t_align">{{ $errors->first('t_align') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_anchor') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_anchor') ? ' is-invalid' : '' }}"
                                                   name="t_anchor" id="input-t_anchor" type="text"
                                                   placeholder="{{ __('Truss anchorage') }}" value="{{ old('t_anchor') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_anchor'))
                                                <span id="t_anchor-error" class="error text-danger"
                                                      for="input-t_anchor">{{ $errors->first('t_anchor') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('c_details') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('c_details') ? ' is-invalid' : '' }}"
                                                   name="c_details" id="input-c_details" type="text"
                                                   placeholder="{{ __('Connections Details') }}" value="{{ old('c_details') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('c_details'))
                                                <span id="c_details-error" class="error text-danger"
                                                      for="input-c_details">{{ $errors->first('c_details') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('b_details') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('b_details') ? ' is-invalid' : '' }}"
                                                   name="b_details" id="input-b_details" type="text"
                                                   placeholder="{{ __('Bracing Details') }}" value="{{ old('b_details') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('b_details'))
                                                <span id="b_details-error" class="error text-danger"
                                                      for="input-b_details">{{ $errors->first('b_details') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('brc_bcb') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('brc_bcb') ? ' is-invalid' : '' }}"
                                                   name="brc_bcb" id="input-brc_bcb" type="text"
                                                   placeholder="{{ __('BCR & BCB') }}" value="{{ old('brc_bcb') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('brc_bcb'))
                                                <span id="brc_bcb-error" class="error text-danger"
                                                      for="input-brc_bcb">{{ $errors->first('brc_bcb') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('wr_wb') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('wr_wb') ? ' is-invalid' : '' }}"
                                                   name="wr_wb" id="input-wr_wb" type="text"
                                                   placeholder="{{ __('WR&WB') }}" value="{{ old('wr_wb') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('wr_wb'))
                                                <span id="wr_wb-error" class="error text-danger"
                                                      for="input-wr_wb">{{ $errors->first('wr_wb') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('tcb') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('tcb') ? ' is-invalid' : '' }}"
                                                   name="tcb" id="input-tcb" type="text"
                                                   placeholder="{{ __('TCB') }}" value="{{ old('tcb') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('tcb'))
                                                <span id="tcb_bcb-error" class="error text-danger"
                                                      for="input-tcb">{{ $errors->first('tcb') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('w_stiffener') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('w_stiffener') ? ' is-invalid' : '' }}"
                                                   name="w_stiffener" id="input-w_stiffener" type="text"
                                                   placeholder="{{ __('Web stiffeners') }}" value="{{ old('w_stiffener') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('w_stiffener'))
                                                <span id="w_stiffener-error" class="error text-danger"
                                                      for="input-w_stiffener">{{ $errors->first('w_stiffener') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('w_beam') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('w_beam') ? ' is-invalid' : '' }}"
                                                   name="w_beam" id="input-w_beam" type="text"
                                                   placeholder="{{ __('Wind beams') }}" value="{{ old('tcb') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('w_beam'))
                                                <span id="w_beam-error" class="error text-danger"
                                                      for="input-w_beam">{{ $errors->first('w_beam') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('t_brace') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('t_brace') ? ' is-invalid' : '' }}"
                                                   name="t_brace" id="input-t_brace" type="text"
                                                   placeholder="{{ __('T-Brace') }}" value="{{ old('t_brace') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('t_brace'))
                                                <span id="t_brace-error" class="error text-danger"
                                                      for="input-t_brace">{{ $errors->first('t_brace') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('p_fascia') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('p_fascia') ? ' is-invalid' : '' }}"
                                                   name="p_fascia" id="input-p_fascia" type="text"
                                                   placeholder="{{ __('Purlins & Fascia') }}" value="{{ old('p_fascia') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('p_fascia'))
                                                <span id="p_fascia-error" class="error text-danger"
                                                      for="input-p_fascia">{{ $errors->first('p_fascia') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('p_spacing') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('p_spacing') ? ' is-invalid' : '' }}"
                                                   name="p_spacing" id="input-p_spacing" type="text"
                                                   placeholder="{{ __('Purlins spacing') }}" value="{{ old('p_spacing') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('p_spacing'))
                                                <span id="p_spacing-error" class="error text-danger"
                                                      for="input-p_spacing">{{ $errors->first('p_spacing') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('f_fixing') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('f_fixing') ? ' is-invalid' : '' }}"
                                                   name="f_fixing" id="input-f_fixing" type="text"
                                                   placeholder="{{ __('Fascia Cleat fixing') }}" value="{{ old('f_fixing') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('f_fixing'))
                                                <span id="f_fixing-error" class="error text-danger"
                                                      for="input-f_fixing">{{ $errors->first('f_fixing') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('f_alignment') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('f_alignment') ? ' is-invalid' : '' }}"
                                                   name="f_alignment" id="input-f_alignment" type="text"
                                                   placeholder="{{ __('Fascia Board alignment') }}" value="{{ old('f_alignment') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('f_alignment'))
                                                <span id="f_alignment-error" class="error text-danger"
                                                      for="input-f_alignment">{{ $errors->first('f_alignment') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('r_cover') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('r_cover') ? ' is-invalid' : '' }}"
                                                   name="r_cover" id="input-r_cover" type="text"
                                                   placeholder="{{ __('Roof cover') }}" value="{{ old('r_cover') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('r_cover'))
                                                <span id="r_cover-error" class="error text-danger"
                                                      for="input-r_cover">{{ $errors->first('r_cover') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('c_type') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('c_type') ? ' is-invalid' : '' }}"
                                                   name="c_type" id="input-c_type" type="text"
                                                   placeholder="{{ __('Cover type') }}" value="{{ old('c_type') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('c_type'))
                                                <span id="c_type-error" class="error text-danger"
                                                      for="input-c_type">{{ $errors->first('c_type') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('f_spacing') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('f_spacing') ? ' is-invalid' : '' }}"
                                                   name="f_spacing" id="input-f_spacing" type="text"
                                                   placeholder="{{ __('Fastener spacing') }}" value="{{ old('f_spacing') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('f_spacing'))
                                                <span id="f_spacing-error" class="error text-danger"
                                                      for="input-f_spacing'">{{ $errors->first('f_spacing') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('v_ridges') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('v_ridges') ? ' is-invalid' : '' }}"
                                                   name="v_ridges" id="input-v_ridges" type="text"
                                                   placeholder="{{ __('Valleys & Ridges') }}" value="{{ old('v_ridges') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('v_ridges'))
                                                <span id="v_ridges-error" class="error text-danger"
                                                      for="input-v_ridges">{{ $errors->first('v_ridges') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col">

                                        <div class="form-group{{ $errors->has('w_flashing') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('w_flashing') ? ' is-invalid' : '' }}"
                                                   name="w_flashing" id="input-w_flashing" type="text"
                                                   placeholder="{{ __('Wall flashings') }}" value="{{ old('w_flashing') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('w_flashing'))
                                                <span id="w_flashing-error" class="error text-danger"
                                                      for="input-w_flashing'">{{ $errors->first('w_flashing') }}</span>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">

                                        <div class="form-group{{ $errors->has('s_touch') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('s_touch') ? ' is-invalid' : '' }}"
                                                   name="s_touch" id="input-s_touch" type="text"
                                                   placeholder="{{ __('Screw touch-up') }}" value="{{ old('s_touch') }}"
                                                   required="true" aria-required="true"/>
                                            @if ($errors->has('s_touch'))
                                                <span id="s_touch-error" class="error text-danger"
                                                      for="input-s_touch">{{ $errors->first('s_touch') }}</span>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="col avatar-upload">
                                        <label class="col-sm-2 col-form-label">{{ __('Upload Photos') }}</label>
                                        <div class="col">
{{--                                            <div class="form-group">--}}

                                                <input class="form-control-file" type="file" id="filename" name="filename[]" multiple required>


{{--                                            </div>--}}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Supervisor comments') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('comments') ? ' has-danger' : '' }}">
                                            <textarea placeholder="{{ __('To capture the comments on the progress of work, correction plan of the noted mistakes/ incomplete details/ any requirements on site/material shortage etc……') }}" name="comments" required="true" id="input-comments" cols="10" rows="5"
                                                      class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}"></textarea>

                                            @if ($errors->has('comments'))
                                                <span id="comments-error" class="error text-danger"
                                                      for="input-comments">{{ $errors->first('comments') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Save as Draft ') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">

                                                    <div class="togglebutton">
                                                        <label>
                                                            <input type="checkbox" name="status" id="status" checked="">
                                                            <span class="toggle"></span>
                                                            Save as Draft
                                                        </label>
                                                    </div>

{{--                                                    <div class="togglebutton">--}}
{{--                                                        <label>--}}
{{--                                                            <input type="checkbox" name="status" id="status">--}}
{{--                                                            <span class="toggle"></span>--}}
{{--                                                            status--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
                                                
                                                @if ($errors->has('status'))
                                                    <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" id="add_project"
                                        class="btn btn-primary">{{ __('Add Report') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery('select[name="client"]').on('change', function () {
                var client = jQuery(this).val();
                console.log(client);
                if (client) {
                    jQuery.ajax({
                        url: 'area/' + client,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="area"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="area"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="area"]').empty();
                }
            });


        });


    </script>
@endsection
