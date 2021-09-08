@extends('backend.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">  
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{route('admin.meal.list')}}" method="GET">
                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <select name="period" id="" class="form-control">
                                    <option selected disabled>Meal Time</option>
                                    <option>Breakfast</option>
                                    <option>Lunch</option>
                                    <option>Dinner</option>
                                    <option>Snacks</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category" id="" class="form-control">
                                    <option selected disabled>Meal Category</option>
                                    <option>Food</option>
                                    <option>Drinks</option>
                                    <option>Pastries</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="origin" id="" class="form-control">
                                    <option selected disabled>Origin</option>
                                    <option>Local</option>
                                    <option>Chinese</option>
                                    <option>Italian</option>
                                    <option>Russian</option>
                                    <option>Intercontinental</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="diet" id="" class="form-control">
                                    <option selected disabled>Diet</option>
                                    <option>Vegetarian</option>
                                    <option>Vegan</option>
                                    <option>Non-Vegetarian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    Filter Meals
                                </button>
                            </div>
                        </div>  
                    </form>  
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.meal.create')}}" class="btn btn-primary">Add Meal</a>
                </div>
                @forelse ($meals as $meal)
                    <div class="col-sm-4 col-md-3 grid" data-foodtype="breakfast" data-origin="intercontinental" data-cost="500">
                        <div class="product">
                            <figure>
                                <img src="{{$meal->image}}" alt="Spring Rolls">
                            </figure>
                            <section class="details">
                                <div class="d-flex justify-content-between">
                                    <h5>{{$meal->name}} </h5>
                                    <h5 class="price">₦{{$meal->price}}</h5>
                                </div>
                                <small class="text-muted">{{$meal->description}}</small>
                                <div class="d-flex">
                                    <a href="{{route('admin.meal.edit',$meal)}}" class="btn btn-sm">edit</a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#delete-item{{$meal->id}}" class="btn btn-sm bg-red">delete</a>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="modal fade modal-mini modal-primary" id="delete-item{{$meal->id}}" tabindex="-1" role="dialog" aria-labelledby="delete-item{{$meal->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <p>Delete Meal</p>
                                </div>
                                <div class="modal-body text-center">
                                    <p>Are you sure you want to delete this Meal</p>
                                </div>
                                <div class="modal-footer">
                                    <form class="d-inline" action="{{route('admin.meal.delete',$meal)}}" method="POST">@csrf
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    </form>
                                    <button type="button" class="btn btn-link btn-simple" style="cursor:pointer" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                @empty
                    <p class="text-center">No Meal</p>
                @endforelse
                

                
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- <script src="{{vendors/datatables.net/jquery.dataTables.js}}"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>    --}}
@endpush
          