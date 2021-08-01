@extends('backend.layouts.app')
@push('styles')
    <style>
        .thumbnail{
            width: 80px;
            height:80px;
            border: 5px solid white;
        }
    </style>
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Create Meal</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{route('admin.meal.save')}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                {{-- <label class="">Title</label> --}}
                                                <input type="text" name="name" class="form-control" placeholder="Title" maxlength="20" required>
                                                <small class="form-text text-muted">Title of the meal</small>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="description" class="form-control" placeholder="All meal items" row='3' style="height:unset;" required></textarea>
                                                <small class="form-text text-muted">Description of the meal</small>
                                            </div>
                                            <div class="form-group d-flex">
                                                <span class="text-muted">Type</span>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="food" value="food" checked>
                                                        <span class="form-check-sign"></span>
                                                        Food
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="drink" value="drink" >
                                                        <span class="form-check-sign"></span>
                                                        Drink
                                                    </label>
                                                </div> 
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="fruit" value="fruit">
                                                        <span class="form-check-sign"></span>
                                                        Fruit
                                                    </label>
                                                </div>   
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="pastries" value="pastries">
                                                        <span class="form-check-sign"></span>
                                                        Pastries
                                                    </label>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                
                                                <div class="col-md-6">
                                                    <label class="">Item Origin</label>
                                                    <select name="origin" id="" class="form-control">
                                                        <option>Intercontinental</option>
                                                        <option>Local</option>
                                                        <option>Chinese</option>
                                                        <option>Italian</option>
                                                        <option>Russian</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="">Diet</label>
                                                    <select name="diet" id="" class="form-control">
                                                        <option value="vegan">Vegan</option>
                                                        <option value="veg">Vegetarian</option>
                                                        <option value="nonveg">Non-Vegetarian</option>
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="form-group companydocument">
                                                <label class="">Select Meal Items</label>
                                                <select name="menu[]" class="form-control select2" multiple required>
                                                    @foreach ($menus as $menu)
                                                        <option label="{{$menu->image}}" value="{{$menu->id}}"> {{$menu->name.'('.$menu->size.') : ₦'.$menu->price}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="">Price</label>
                                                    <input type="number" name="price" class="form-control" placeholder="0.0" required>  
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="">Image</label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                          </a>
                                                        </span>
                                                        <input id="thumbnail" class="form-control" type="text" name="file">
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </div>
                                        <div class="col-md-5">
                                            <h5>Featured Image</h5>
                                            
                                            <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                        </div>
                                    </div>
                                    {{-- <div class="row"> --}}
                                        <div class="d-flex justify-content-center row">
                                            <button class="btn btn-primary btn-block col-md-4" type="submit">
                                                Save Meal
                                            </button>
                                        </div>
                                    {{-- </div> --}}
                                </fieldset> 
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    
    <script>
        function formatState (state) {
            if (!state.id) {
                return state.text;
            }
            
            var $state = $(
                '<span><img src="' + state.element.label+'" class="thumbnail mr-2" /> ' + state.text + '</span>'
            );
            // var $state = $(
            //     '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-thumbnail" /> ' + state.text + '</span>'
            // );
            return $state;
        }
        function formatSelection (state) {
            if (!state.id) {
                return state.text;
            }
            var $state = $(
                '<span><img src="' + state.element.label+ '" class="thumbnail mr-2" /> </span>'
            );
            // var $state = $(
            //     '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-thumbnail" /> ' + state.text + '</span>'
            // );
            return $state;
        }
        $('.select2').select2({
            templateResult: formatState,
            templateSelection: formatSelection,
            placeholder:"Click here",
        });
    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endpush
          