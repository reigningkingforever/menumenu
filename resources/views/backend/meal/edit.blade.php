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
                            <h4 class="card-title">Edit Meal</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{route('admin.meal.update',$meal)}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                {{-- <label class="">Title</label> --}}
                                                <input type="text" name="name" value="{{$meal->name}}" class="form-control" placeholder="Title" required>
                                                <small class="form-text text-muted">Title of the meal</small>
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="">Sub Title</label> --}}
                                                <textarea name="description" class="form-control" rows="2" style="height: unset" required>{{$meal->description}}</textarea>
                                                <small class="form-text text-muted">description of the meal</small>
                                            </div>
                                            <div class="form-group d-flex">
                                                <span class="text-muted">Type</span>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="food" value="food" @if($meal->type == 'food') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Food
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="drink" value="drink" @if($meal->type == 'drink') checked @endif >
                                                        <span class="form-check-sign"></span>
                                                        Drink
                                                    </label>
                                                </div> 
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="fruit" value="fruit" @if($meal->type == 'fruit') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Fruit
                                                    </label>
                                                </div>   
                                                <div class="form-check form-check-radio mt-3">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input food-type" type="radio" name="type" id="pastries" value="pastries" @if($meal->type == 'pastries') checked @endif>
                                                        <span class="form-check-sign"></span>
                                                        Pastries
                                                    </label>
                                                </div>    
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="">Item Origin</label>
                                                    <select name="origin" id="" class="form-control">
                                                        <option @if($meal->origin == 'intercontinental') selected @endif value="intercontinental">Intercontinental</option>
                                                        <option @if($meal->origin == 'local') selected @endif value="local">Local</option>
                                                        <option @if($meal->origin == 'chinese') selected @endif value="chinese">Chinese</option>
                                                        <option @if($meal->origin == 'italian') selected @endif value="italian">Italian</option>
                                                        <option @if($meal->origin == 'russian') selected @endif value="russian">Russian</option>                        
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="">Diet</label>
                                                    <select name="diet" id="" class="form-control">
                                                        <option @if($meal->diet == 'vegan') selected @endif value="vegan">Vegan</option>
                                                        <option @if($meal->diet == 'veg') selected @endif value="veg">Vegetarian</option>
                                                        <option @if($meal->diet == 'nonveg') selected @endif value="nonveg">Non-Vegetarian</option>
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="form-group companydocument">
                                                <label class="">Select Meal Items</label>
                                                <select name="menu[]" class="form-control select2" multiple required>
                                                    @foreach ($menus as $menu)
                                                        <option label="{{$menu->image}}" value="{{$menu->id}}" @if(in_array($menu->id,$meal->items->pluck('id')->toArray())) selected @endif> {{$menu->name.'('.$menu->size.') : ₦'.$menu->price}} </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            
                                            
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="">Price</label>
                                                    <input type="number" name="price" value="{{$meal->price}}" class="form-control" placeholder="0.0" required>   
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
                                            <h6>Existing Image</h6>
                                            <img src="{{$meal->image}}" style="height:400px;" class="w-100" data-format="image" id="featured">
                                            <h5>NEW IMAGE</h5>
                                            <div id="holder" style="margin-top:15px;max-height:300px;"></div>
                                            
                                            
                                            {{-- <input name="featured_image" id="featured_image" type="hidden">       --}}
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
          