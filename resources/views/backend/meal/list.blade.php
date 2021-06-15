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
                                <select name="" id="" class="form-control">
                                    <option>Meal Time</option>
                                    <option>Breakfast</option>
                                    <option>Lunch</option>
                                    <option>Dinner</option>
                                    <option>Snacks</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option>Meal Type</option>
                                    <option>Food</option>
                                    <option>Drinks</option>
                                    <option>Pastries</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option>Origin</option>
                                    <option>Local</option>
                                    <option>Chinese</option>
                                    <option>Italian</option>
                                    <option>Russian</option>
                                    <option>Intercontinental</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option>Diet</option>
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
                                <img src="{{asset('img/gallery/01.jpg')}}" alt="Spring Rolls">
                            </figure>
                            <section class="details">
                                <div class="d-flex justify-content-between">
                                    <h5>{{$meal->name}} </h5>
                                    <h5 class="price">₦{{$meal->price}}</h5>
                                </div>
                                <small class="text-muted">{{$meal->subname}}</small>
                                    
                                
                                <div class="options mb-1">
                                    <div class="options-size mb-1">
                                        <span style="font-weight:bold;text-decoration:underline;display:block;text-align:center">Items</span>	
                                    </div>
                                    <div class="options-colors">
                                        @foreach ($meal->items as $item)
                                             <span>{{$item->name}}</span> 
                                             @if(!$loop->last)+ @endif
                                        @endforeach      
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="{{route('admin.meal.edit',$meal)}}" class="btn btn-sm">edit</a>
                                    <a href="#" class="btn btn-sm bg-red">delete</a>
                                </div>
                            </section>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No Meal</p>
                @endforelse
                {{-- <div class="col-sm-4 col-md-3 grid" data-foodtype="breakfast" data-origin="intercontinental" data-cost="500">
                    <div class="product">
                        <figure>
                            <img src="{{asset('img/gallery/01.jpg')}}" alt="Spring Rolls">
                        </figure>
                        <section class="details">
                            <div class="d-flex justify-content-between">
                                <h5>Spring Rolls </h5>
                                <h5 class="price">₦500</h5>
                            </div>
                            
                                
                            <small class="text-muted">and Samosa</small>
                                
                            
                            <div class="options mb-1">
                                <div class="options-size mb-1">
                                    <span class="">Accessories:</span><span>Chicken</span>	
                                </div>
                                <div class="options-colors">
                                    <span>Soup:</span><span>-</span>	
                                </div>
                                <div class="options-colors">
                                    <span>Drink:</span><span>fanta</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="#" class="btn btn-sm">edit</a>
                                <a href="#" class="btn btn-sm bg-red">delete</a>
                            </div>
                        </section>
                    </div>
                </div> --}}

                
            </div>
        </div>
    </div>
@endsection

@push('scripts')
{{-- <script src="{{vendors/datatables.net/jquery.dataTables.js}}"></script>
<script src="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>    --}}
@endpush
          