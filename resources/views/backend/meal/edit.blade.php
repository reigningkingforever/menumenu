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
                                                <input type="text" name="subname" value="{{$meal->subname}}" class="form-control" placeholder="Sub Title" required>
                                                <small class="form-text text-muted">subname of the meal</small>
                                            </div>

                                            <div class="form-group companydocument">
                                                <label class="">Select Meal Items</label>
                                                <select name="menu[]" class="form-control select2" multiple required>
                                                    @foreach ($menus as $menu)
                                                        <option label="{{$menu->media->name}}" value="{{$menu->id}}" @if(in_array($menu->id,$meal->items->pluck('id')->toArray())) selected @endif> {{$menu->name.'('.$menu->size.') : ₦'.$menu->price}} </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            
                                            
                                            {{-- <button type="button" class="d-block mb-2 addmore">Add Other Meal</button> --}}
                                            
                                            <label>Add meal to routine (optional)</label>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label">Days</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check checkbox-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="monday" value="1" @if($meal->monday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Monday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="tuesday" value="1" @if($meal->tuesday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Tuesday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="wednesday" value="1" @if($meal->wednesday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Wednesday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="thursday" value="1" @if($meal->thursday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Thursday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="friday" value="1" @if($meal->friday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Friday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="saturday" value="1" @if($meal->saturday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Saturday
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="sunday" value="1" @if($meal->sunday) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Sunday
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Meal Periods (optional)</label>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-2 control-label">Period</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-check checkbox-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="breakfast" value="1" @if($meal->breakfast) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Breakfast
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="lunch" value="1" @if($meal->lunch) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Lunch
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="dinner" value="1" @if($meal->dinner) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Dinner
                                                            </label>
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" name="dessert" value="1" @if($meal->dessert) checked @endif>
                                                                <span class="form-check-sign"></span>
                                                                Dessert
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="">Price</label>
                                                    <input type="number" name="price" value="{{$meal->price}}" class="form-control" placeholder="0.0" required>   
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="">Image</label>
                                                    <input type="file" name="file" id="cover">
                                                </div>                                     
                                            </div>                                
                                        </div>
                                        <div class="col-md-5">
                                            {{-- <p>Featured Image</p> --}}
                                            <img src="{{asset('storage/meals/'.$meal->media->name)}}" alt="" style="height:400px;" class="w-100" data-format="image" id="featured">
                                            
                                            
                                            
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
        
        $("#cover").change(function() {
            readURL(this,'featured');
            // $('#remove_image').show();
        });
        function readURL(input,output) {
            console.log(input.id);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#'+output).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
    </script>
    <script>
        $(document).on('click','.addmore',function(){
            var product = `<div class="input-group companydocument mb-2">
                                                
                                                <select class="form-control" name="types[]">
                                                    <option selected disabled>Add Meal</option>

                                                </select>
                                                
                                                <button type="button" class="input-group-text input-group-append input-group-addon removemore">
                                                    <i class="fa fa-times mr-1 "></i>Del
                                                </button>
                                            </div>`;
            $('.companydocument').last().after(product);
        });
        
        $(document).on('click','.removemore',function(){
            if($('.companydocument').length > 1){
                $(this).closest('.companydocument').remove();
            }
        });
    </script>
    <script>
        function formatState (state) {
            if (!state.id) {
                return state.text;
            }

            var baseUrl = "{{asset('storage/meals/')}}";
            var $state = $(
                '<span><img src="' + baseUrl + '/'+ state.element.label+'" class="thumbnail mr-2" /> ' + state.text + '</span>'
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
            var baseUrl = "{{asset('storage/meals/')}}";
            var $state = $(
                '<span><img src="' + baseUrl +'/'+ state.element.label+ '" class="thumbnail mr-2" /> </span>'
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
@endpush
          