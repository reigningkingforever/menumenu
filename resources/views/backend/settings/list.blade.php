@extends('backend.layouts.app')

@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Form Elements</h4>
                        </div>
                        <div class="card-body ">
                            <div class="dashboard-box">
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">General</a></li>
                                    <li class="nav-item"><a class="nav-link" id="places-tabs" data-toggle="tab" href="#places" role="tab" aria-controls="places" aria-selected="false" data-original-title="" title="">Places</a></li>
                                    <li class="nav-item"><a class="nav-link" id="others-tabs" data-toggle="tab" href="#others" role="tab" aria-controls="others" aria-selected="false" data-original-title="" title="">Others</a></li>
                                </ul>
                                <div class="tab-content p-5" id="myTabContent">
                                    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <form method="get" action="/" class="form-horizontal">
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">With help</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control">
                                                            <small class="form-text text-muted">A block of help text that breaks onto a new line.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Placeholder</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" placeholder="placeholder" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Disabled</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" placeholder="Disabled input here..." disabled="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Static control</label>
                                                        <div class="col-sm-10">
                                                            <p class="form-control-static">hello@creative-tim.com</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Checkboxes and radios</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                    First Checkbox
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                    Second Checkbox
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-radio">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios1" value="option1">
                                                                    <span class="form-check-sign"></span>
                                                                    Radio is off
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-radio">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio" name="exampleRadio" id="exampleRadios2" value="option2" checked="">
                                                                    <span class="form-check-sign"></span>
                                                                    Radio is on
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-2 control-label">Inline checkboxes</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-check checkbox-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="option1">
                                                                    <span class="form-check-sign"></span>
                                                                    a
                                                                </label>
                                                            </div>
                                                            <div class="form-check checkbox-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="option2">
                                                                    <span class="form-check-sign"></span>
                                                                    b
                                                                </label>
                                                            </div>
                                                            <div class="form-check checkbox-inline">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="option3">
                                                                    <span class="form-check-sign"></span>
                                                                    c
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4 class="title">Datetime Picker</h4>
                                                            <div class="form-group">
                                                                <input id="datetimepicker" type="text" class="form-control datetimepicker" placeholder="Datetime Picker Here">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4 class="title">Date Picker</h4>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control datepicker" placeholder="Date Picker Here">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4 class="title">Time Picker</h4>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control timepicker" placeholder="Time Picker Here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <h4 class="title">Switches</h4>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <p class="category">Default</p>
                                                                <input type="checkbox" checked="" data-toggle="switch" data-on-color="info" data-off-color="info">
                                                                <span class="toggle"></span>
                                                                <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                                                                <span class="toggle"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <p class="category">Plain</p>
                                                                <input type="checkbox" checked="" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-text="" data-off-text="">
                                                                <span class="toggle"></span>
                                                                <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-text="" data-off-text="">
                                                                <span class="toggle"></span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <p class="category">With Icons</p>
                                                                <input type="checkbox" checked="" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
                                                                <span class="toggle"></span>
                                                                <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info" data-on-text="<i class='fa fa-check'></i>" data-off-text="<i class='fa fa-times'></i>">
                                                                <span class="toggle"></span>
                                                            </div>
                                                        </div>
            
                                                    
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="places" role="tabpanel" aria-labelledby="places-tabs">

                                        <div class="row">
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Active States</label>
                                                    <select name="state[]" class="form-control form-control-lg select2" style="width: 100%">
                                                        @foreach ($states as $state)
                                                            <option value="{{$state->name}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary">Deactivate State</button>
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Inactive State</label>
                                                    <select name="state[]" class="form-control select2" style="width: 100%">
                                                        @foreach ($states as $state)
                                                            <option value="{{$state->name}}">{{$state->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-danger">Activate State</button>
                                            </div>
                                            
                                        </div>

                                        <div class="row my-5">
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Active Cities</label>
                                                    <select name="cities[]" class="form-control form-control-lg select2" style="width: 100%" multiple>
                                                        @foreach ($cities as $city)
                                                            <option value="{{$city->name}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary">Deactivate Cities</button>
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Inactive Cities</label>
                                                    <select name="state[]" class="form-control select2" style="width: 100%" multiple>
                                                        @foreach ($cities as $city)
                                                            <option value="{{$city->name}}">{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-danger">Activate Cities</button>
                                            </div>
                                            
                                        </div>

                                        <div class="row my-5">
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Active Towns</label>
                                                    <select name="towns[]" class="form-control form-control-lg select2" style="width: 100%" multiple>
                                                        @foreach ($towns as $town)
                                                            <option value="{{$town->name}}">{{$town->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary">Deactivate Towns</button>
                                            </div>
                                            <div class="col-md-6 d-flex flex-column justify-content-center">
                                                <div class="form-group">
                                                    <label>Inactive Towns</label>
                                                    <select name="towns[]" class="form-control select2" style="width: 100%" multiple>
                                                        @foreach ($towns as $town)
                                                            <option value="{{$town->name}}">{{$town->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-danger">Activate Towns</button>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>
                                    <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tabs">
                                        <h4>This is others tab</h4>
                                    </div>
                                </div>
                                
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $('.select2').select2({
        placeholder:"Select"
    });
    </script>
@endpush
          