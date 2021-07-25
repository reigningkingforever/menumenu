@extends('backend.layouts.app')
@push('styles')
<link href="{{asset('vendor/summernote/summernote.css')}}" rel="stylesheet">
{{-- <link href="{{asset('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css')}}" rel="stylesheet"> --}}

@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Create Post</h4>
                        </div>
                        <div class="card-body ">
                            <form method="post" action="{{route('admin.post.save')}}" enctype="multipart/form-data"> @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="">Title</label>
                                                <input type="text" name="title" class="form-control" value="{{url('/laravel-filemanager')}}">
                                                <small class="form-text text-muted">Title of the article</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Description</label>
                                                <textarea id="summernote-editor" name="content">{!! old('content', 'test editor content') !!}</textarea>
                                                {{-- <textarea name="description" class="form-control" rows="10" style="height: unset"></textarea> --}}
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
    <script src="{{asset('vendor/summernote/summernote.js')}}"></script>
    <script>
        $(document).ready(function(){
      
          // Define function to open filemanager window
          var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
          };
      
          // Define LFM summernote button
          var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
              contents: '<i class="note-icon-picture"></i> ',
              tooltip: 'Insert image with filemanager',
              click: function() {
      
                lfm({type: 'image', prefix: 'http://localhost/menumenu/public/laravel-filemanager'}, function(lfmItems, path) {
                  lfmItems.forEach(function (lfmItem) {
                    context.invoke('insertImage', lfmItem.url);
                  });
                });
      
              }
            });
            return button.render();
          };
      
          // Initialize summernote with LFM button in the popover button group
          // Please note that you can add this button to any other button group you'd like
          $('#summernote-editor').summernote({
            focus: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['popovers', ['lfm']],
                ['insert', ['link','video']],
                ['view', ['fullscreen', 'codeview']]
            ],
            buttons: {
              lfm: LFMButton
            }
          })
        });
    </script>
@endpush
          