@extends('backend.layouts.app')

@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Create Sermon</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{route('admin.post.save')}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="">Title</label>
                                                <input type="text" name="title" class="form-control">
                                                <small class="form-text text-muted">Title of the article</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Description</label>
                                                <textarea name="description" class="form-control" rows="10" style="height: unset"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Tags</label>
                                                <input type="text" name="tags" class="form-control">
                                                <small class="form-text text-muted">Separate tags with commas.</small>
                                            </div>
                                            <div class="form-group d-flex mt-4">
                                                <span class="text-muted">Status</span>
                                                <div class="form-check form-check-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input mode" type="radio" name="status" id="draft" value="0">
                                                        <span class="form-check-sign"></span>
                                                        Draft
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-radio">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input mode" type="radio" name="status" id="published" value="1" checked="">
                                                        <span class="form-check-sign"></span>
                                                        Published
                                                    </label>
                                                </div>    
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Upload Post Photo/Banner</h4>
                                            <input type="file" name="file" id="cover" required>
                                            <h4> Image</h4>
                                            <img src="{{asset('img/no-image.jpg')}}" alt="" style="height:400px;" class="w-100" data-format="image" id="featured">
                                            {{-- <input name="featured_image" id="featured_image" type="hidden">       --}}
                                        </div>
                                    </div>
                                    {{-- <div class="row"> --}}
                                        <div class="d-flex justify-content-center row">
                                            <button class="btn btn-primary btn-block col-md-4" type="submit">
                                                Save Post
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
@endpush
          