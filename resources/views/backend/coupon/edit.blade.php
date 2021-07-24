@extends('backend.layouts.app')
@push('styles')
    
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Create Coupon</h4>
                        </div>
                        <div class="card-body ">
                            <div class="dashboard-box">
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" data-original-title="" title="">General</a></li>
                                    <li class="nav-item"><a class="nav-link" id="restriction-tabs" data-toggle="tab" href="#restriction" role="tab" aria-controls="restriction" aria-selected="false" data-original-title="" title="">Restriction</a></li>
                                </ul>
                                <form class="needs-validation" action="{{route('admin.coupon.save')}}" method="POST">@csrf
                                    <div class="tab-content p-5" id="myTabContent">
                                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group row">
                                                        <label for="title" class="col-xl-3 col-md-4"><span>*</span> Coupon Title</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" id="title" name="name" value="{{$coupon->name ?? old('name')}}" type="text" required="">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="code" class="col-xl-3 col-md-4"><span>*</span>Coupon Code</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" id="code" name="code"  value="{{$coupon->code?? old('code')}}" type="text" required="" >
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">Start Date</label>
                                                        <div class="col-md-7 px-0">
                                                            <input class="form-control datetimepicker " name="start_date" value="{{$coupon->start_at ? $coupon->start_at->toDateString() : old('start_date')}}" id="datepicker" type="text"  data-language="en">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">End Date</label>
                                                        <div class="col-md-7 px-0">
                                                            <input class="form-control datepicker" name="end_date" value="{{$coupon->end_at ? $coupon->end_at->toDateString() : old('end_date')}}" id="end_date" type="text" data-language="en">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">Quantity</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" type="number" name="quantity" value="{{$coupon->available}}" required="">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">Discount Type</label>
                                                        <div class="col-md-7">
                                                            <select class="custom-select" required="" name="type">
                                                                <option value="">--Select--</option>
                                                                <option value="percent"  @if($coupon->type == "percent") selected @endif>Percent</option>
                                                                <option value="fixed" @if($coupon->type == "fixed") selected @endif>Fixed</option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="discountvalue" class="col-xl-3 col-md-4"><span>*</span>Discount Value</label>
                                                        <div class="col-md-7">
                                                            <input class="form-control" id="discountvalue" name="value" value="{{$coupon->value}}" type="number" required="" >
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">Free Shipping</label>
                                                        <div class="checkbox checkbox-primary col-md-7">
                                                            <input id="checkbox-primary-1" type="checkbox" data-original-title="" title="" name="shipping" @if($coupon->free_shipping) checked @endif value="1">
                                                            <label for="checkbox-primary-1">Allow Free Shipping</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-md-4">Status</label>
                                                        <div class="checkbox checkbox-primary col-md-7">
                                                            <input id="checkbox-primary-2" type="checkbox" data-original-title="" title="" name="status" @if($coupon->status) checked @endif value="1">
                                                            <label for="checkbox-primary-2">Enable the Coupon</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="restriction" role="tabpanel" aria-labelledby="restriction-tabs">
                                            {{-- <form class="needs-validation" novalidate=""> --}}
                                                
                                                 
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-md-4" for="meals">Meal</label>
                                                    <div class="col-md-7 px-0">
                                                        <select class="custom-select select2" name="meals[]" id="meals" multiple style="width:100%;">
                                                            @foreach ($meals as $meal)
                                                                <option value="{{$meal->id}}" @if($coupon->meal_limit && in_array($meal->id,$coupon->meal_limit)) selected @endif>{{$meal->name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-md-4" for="states">State</label>
                                                    <div class="col-md-7 px-0">
                                                        <select class="custom-select select2" name="states[]" id="states" multiple style="width:100%;">
                                                            @foreach ($states as $state)
                                                                <option value="{{$state->id}}" @if($coupon->state_limit && in_array($state->id,$coupon->state_limit)) selected @endif>{{$state->name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-md-4" for="cities">City</label>
                                                    <div class="col-md-7 px-0">
                                                        <select class="custom-select select2" name="cities[]" id="cities" multiple style="width:100%;">
                                                            @foreach ($cities as $city)
                                                                <option value="{{$city->id}}" @if($coupon->city_limit && in_array($city->id,$coupon->city_limit)) selected @endif>{{$city->name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-md-4" for="towns">Town</label>
                                                    <div class="col-md-7 px-0">
                                                        <select class="custom-select select2" name="towns[]" id="towns" multiple style="width:100%;">
                                                            @foreach ($towns as $town)
                                                                <option value="{{$town->id}}" @if($coupon->town_limit && in_array($town->id,$coupon->town_limit)) selected @endif>{{$town->name}}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="minimum_spend" class="col-xl-3 col-md-4">Minimum Spend</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" id="minimum_spend" type="number" name="minimum_spend" value="{{$coupon->minimum_spend}}">
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group row">
                                                    <label for="maximum_spend" class="col-xl-3 col-md-4">Maximum Spend</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" id="maximum_spend" type="number" name="maximum_spend" value="{{$coupon->maximum_spend}}">
                                                    </div>
                                                    
                                                </div>
                                                <h4>Usage Limits</h4>
                                                
                                                <div class="form-group row">
                                                    <label for="per_customer" class="col-xl-3 col-md-4">Per Customer</label>
                                                    <div class="col-md-7">
                                                        <input class="form-control" id="per_customer" type="number" name="per_customer" value="{{$coupon->limit_per_user}}">
                                                    </div>
                                                    
                                                </div>
                                           
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
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
          