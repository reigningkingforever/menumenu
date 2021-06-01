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
                                                <input type="text" name="title" class="form-control" placeholder="Title">
                                                <small class="form-text text-muted">Title of the meal</small>
                                            </div>
                                            <div class="form-group">
                                                {{-- <label class="">Sub Title</label> --}}
                                                <input type="text" name="title" class="form-control" placeholder="Sub Title">
                                                <small class="form-text text-muted">Title of the meal</small>
                                            </div>

                                            <div class="form-group companydocument">
                                                <label class="">Select Meals</label>
                                                <select class="form-control select2" multiple>
                                                    @foreach ($meals as $meal)
                                                        <option label="{{$meal->media->name}}"> {{$meal->description}} </option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                            {{-- <div class="input-group companydocument mb-2">
                                                
                                                <select class="form-control" name="types[]">
                                                    <option selected disabled>Select Type</option>

                                                </select>
                                                
                                                <button type="button" class="input-group-text input-group-append input-group-addon removemore">
                                                    <i class="fa fa-times mr-1 "></i>Del
                                                </button>
                                            </div> --}}
                                            
                                            {{-- <button type="button" class="d-block mb-2 addmore">Add Other Meal</button> --}}
                                            
                                            <label>Add meal to routine (optional)</label>

                                            <div class="form-group row">
                                                
                                                <div class="col-md-4">
                                                    <label class="">Day</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Not Set</option>
                                                        <option>Monday</option>
                                                        <option>Tuesday</option>
                                                        <option>Wednesday</option>
                                                        <option>Thursday</option>
                                                        <option>Friday</option>
                                                        <option>Saturday</option>
                                                        <option>Sunday</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="">Meal Time</label>
                                                    <select name="" id="" class="form-control">
                                                        <option>Not Set</option>
                                                        <option>Breakfast</option>
                                                        <option>Lunch</option>
                                                        <option>Dinner</option>
                                                        <option>Snacks</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="">Price</label>
                                                    <input type="number" name="price" class="form-control" placeholder="0.0">   
                                                </div>                                     
                                            </div>                                
                                        </div>
                                        <div class="col-md-5">
                                            {{-- <p>Featured Image</p> --}}
                                            <img src="{{asset('img/no-image.jpg')}}" alt="" style="height:400px;" class="w-100" data-format="image" id="featured">
                                            <input type="file" name="file" id="cover" required>
                                            
                                            
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
            // {{asset('img/gallery/01.jpg')}}
            var baseUrl = "{{asset('img/gallery/')}}";
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
            // {{asset('img/gallery/01.jpg')}}
            var baseUrl = "{{asset('img/gallery/')}}";
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
          