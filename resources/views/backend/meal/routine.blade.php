@extends('backend.layouts.app')
@push('styles')
<link rel='stylesheet' href='{{asset('backend/css/all.min.css')}}'>
<link rel="stylesheet" href="{{asset('backend/css/routine.css')}}">
<style>
  .thumbnail{
      width: 30px;
      height:30px;
      border: 5px solid white;
  }
  span.select2.select2-container.select2-container--default{width:319px !important;}
  .select2-container--default .select2-selection--single{height:40px !important;}
</style>
@endpush
@section('main')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">Routine</h4>
                        </div>
                        <div class="card-body">
                          <div class="row justify-content-center align-items-center pb-2">
                            <div style="text-align:center;">
                              {{-- 
                                    <div>
                                      <h2>Drag And Drop Calendar/Scheduler</h2>
                                    </div>
                                    <div>
                                      <span>Drag and drop tasks wherever you want on the calendar/scheduler</span><br>
                                      <span>Hover on a task to edit or delete the specific task.</span>
                                    </div>
                                    <span><a href="https://crezzur.com">www.crezzur.com</a> - info@crezzur.com</span> 
                                --}}
                              <form>
                                <div class="d-flex justify-content-center">
                                  <div>
                                    <label>Year</label>
                                    <select class="form-control">
                                      <option>2021</option>
                                      <option>2022</option>
                                      <option>2023</option>
                                      <option>2024</option>
                                      <option>2025</option>
                                    </select>
                                  </div>
                                  <div>
                                    <label>Month</label>
                                    <select class="form-control">
                                      <option>July</option>
                                      <option>August</option>
                                      <option>September</option>
                                      <option>October</option>
                                      <option>November</option>
                                      <option>December</option>
                                    </select>
                                  </div>
                                  <div class="d-flex flex-column justify-content-end">
                                    <button class="btn btn-primary btn-md">Change</button>
                                  </div>
                                </div>
                              </form>
                              
                              <form>		
                                  <div class="form-check checkbox-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="food" value="1">
                                        <span class="form-check-sign"></span>
                                        Food
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="drinks" value="1">
                                        <span class="form-check-sign"></span>
                                        Drinks
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="fruits" value="1">
                                        <span class="form-check-sign"></span>
                                        Fruits
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="pastries" value="1">
                                        <span class="form-check-sign"></span>
                                        Pastries
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="veg" value="1">
                                        <span class="form-check-sign"></span>
                                        Veg
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="vegan" value="1">
                                        <span class="form-check-sign"></span>
                                        Vegan
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="nonveg" value="1">
                                        <span class="form-check-sign"></span>
                                        NonVeg
                                    </label>
                                  </div>
                                  
                              </form>
                            </div>
                          
                          </div>
                          <div class="table-responsive">

                            <div data-parse="1595877840000" id="calplaceholder" style="max-height: 500px; margin-bottom: 0;">
                              <div class="cal-sectionDiv">
                                <table class="table table-striped table-bordered">
                                  <thead class="cal-thead">
                                    <tr>
                                      <th class="cal-viewmonth" id="changemonth">{{$days[0]->format('M Y')}}</th>
                                      @foreach($days as $day)
                                        <th class="cal-toprow @if($day->format('l')=='Saturday' || $day->format('l')=='Sunday') weekend @endif">{{$day->format('l d')}}</th>
                                      @endforeach
                                    </tr>
                          
                                  </thead>
                                  <tbody class="cal-tbody">
                                    <tr id="h16">
                                      <td class="cal-usersheader" style="color:#000; background-color:#389fe8; padding: 0px;">Breakfast</td>
                                      <td colspan="31" style="color:#FFFFFF; background-color:#389fe8;"></td>
                                    </tr>
                                    <tr id="u1">
                                        <td class="cal-userinfo">
                                          <span><b style="text-decoration: underline">Van Els</b> Numan<span></span></span>
                                          <div class="cal-usercounter">
                                            <span class="cal-userbadge badge badge-light">140:13</span><span class="cal-userbadge badge badge-warning">134:36</span>
                                          </div>
                                          <div class="cal-userarrows">
                                            <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>
                                          </div>
                                        </td>
                                      @foreach ($days as $day)
                                        <td class="@if($day->format('l')=='Saturday' || $day->format('l')=='Sunday') weekend @endif ui-droppable" data-date="{{$day->format('Y-m-d')}}" data-period="breakfast">
                                          @forelse($calendars->where('period','breakfast') as $calendar)
                                              @if($calendar->datentime->format('Y-m-d') == $day->format('Y-m-d'))
                                                <div class="drag details ui-draggable ui-draggable-handle" data-calendar_id="{{$calendar->id}}" data-period="{{$calendar->period}}" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">
                                                  <h3 class="details-task" style=" background: #51FF00; color: #000000">{{$calendar->meal->name}}</h3>
                                                  <div class="details-uren">
                                                    15:00 - 16:30
                                                  </div>
                                                </div>
                                              @endif  
                                          @empty
                                          @endforelse
                                        </td>
                                      @endforeach
                                    </tr>
                                    <tr id="h17">
                                      <td class="cal-usersheader" style="color:#FFF; background-color:#570099; padding: 0px;">Lunch</td>
                                      <td colspan="31" style="color:#FFF; background-color:#570099;"></td>
                                    </tr>
                                    <tr id="u2">
                                      <td class="cal-userinfo">
                                        <span><b style="text-decoration: underline">Henzen</b> Susanna<span></span></span>
                                        <div class="cal-usercounter">
                                          <span class="cal-userbadge badge badge-light">140:13</span><span class="cal-userbadge badge badge-warning">134:36</span>
                                        </div>
                                        <div class="cal-userarrows">
                                          <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>
                                        </div>
                                      </td>
                                      @foreach ($days as $day)
                                      <td class="@if($day->format('l')=='Saturday' || $day->format('l')=='Sunday') weekend @endif ui-droppable" data-date="{{$day->format('Y-m-d')}}" data-period="lunch">
                                          @forelse($calendars->where('period','lunch') as $calendar)
                                              @if($calendar->datentime->format('Y-m-d') == $day->format('Y-m-d'))
                                                <div class="drag details ui-draggable ui-draggable-handle" data-calendar_id="{{$calendar->id}}" data-period="{{$calendar->period}}" style="border-left: 5px solid #2473AB; position: relative;">
                                                  <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">{{$calendar->meal->name}}</h3>
                                                  <div class="details-uren">
                                                    15:00 - 16:30
                                                  </div>
                                                </div>
                                              @endif  
                                          @empty
                                          @endforelse
                                      </td>
                                      @endforeach
                                      
                                    </tr>
                                    <tr id="h18">
                                      <td class="cal-usersheader" style="color:#FFF; background-color:#169b3e; padding: 0px;">Dinner</td>
                                      <td colspan="31" style="color:#FFF; background-color:#169b3e;"></td>
                                    </tr>
                                    <tr id="u3">
                                      <td class="cal-userinfo">
                                        <span><b style="text-decoration: underline">Mak</b> Lokman<span></span></span>
                                        <div class="cal-usercounter">
                                          <span class="cal-userbadge badge badge-light">140:13</span><span class="cal-userbadge badge badge-warning">134:36</span>
                                        </div>
                                        <div class="cal-userarrows">
                                          <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>
                                        </div>
                                      </td>
                                      @foreach ($days as $day)
                                      <td class="@if($day->format('l')=='Saturday' || $day->format('l')=='Sunday') weekend @endif ui-droppable" data-date="{{$day->format('Y-m-d')}}" data-period="dinner">
                                          @forelse($calendars->where('period','dinner') as $calendar)
                                              @if($calendar->datentime->format('Y-m-d') == $day->format('Y-m-d'))
                                                <div class="drag details ui-draggable ui-draggable-handle" data-calendar_id="{{$calendar->id}}" data-period="{{$calendar->period}}" style="border-left: 5px solid #2473AB; position: relative;">
                                                  <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">{{$calendar->meal->name}}</h3>
                                                  <div class="details-uren">
                                                    15:00 - 16:30
                                                  </div>
                                                </div>
                                              @endif  
                                          @empty
                                          @endforelse
                                      </td>
                                      @endforeach
                                    </tr>
                                    <tr id="h19">
                                      <td class="cal-usersheader" style="color:#FFF; background-color:#adca06; padding: 0px;">Dessert</td>
                                      <td colspan="31" style="color:#FFF; background-color:#adca06;"></td>
                                    </tr>
                                    <tr id="u4">
                                      <td class="cal-userinfo">
                                        <span><b style="text-decoration: underline">Boschman</b> Feike<span></span></span>
                                        <div class="cal-usercounter">
                                          <span class="cal-userbadge badge badge-light">140:13</span><span class="cal-userbadge badge badge-warning">134:36</span>
                                        </div>
                                        <div class="cal-userarrows">
                                          <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>
                                        </div>
                                      </td>
                                      @foreach ($days as $day)
                                      <td class="@if($day->format('l')=='Saturday' || $day->format('l')=='Sunday') weekend @endif ui-droppable" data-date="{{$day->format('Y-m-d')}}" data-period="dessert">
                                        @forelse($calendars->where('period','dessert') as $calendar)
                                              @if($calendar->datentime->format('Y-m-d') == $day->format('Y-m-d'))
                                                <div class="drag details ui-draggable ui-draggable-handle" data-calendar_id="{{$calendar->id}}" data-period="{{$calendar->period}}" style="border-left: 5px solid #BD0000; position: relative;">
                                                  <h3 class="details-task" style=" background: #BD0000; color: #FFFFFF">{{$calendar->meal->name}}</h3>
                                                  <div class="details-uren">
                                                    15:00 - 16:30
                                                  </div>
                                                </div>
                                              @endif  
                                          @empty
                                        @endforelse
                                      </td>
                                      @endforeach
                                    </tr>  
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            
                          </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- DISPLAY MODAL: EDIT -->
<div class="modal fade" id="edittask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div id="modal-edit" class="modal-body">
          <div class="input-group mb-2 text-center">
          <i style="color:red">Edit box is only for preview purposes and does not save any data.</i>
          </div>
          <div class="input-group mb-2">
            <label for="cono1" class="col-sm-2 text-left control-label col-form-label">Task:</label>
            <input type="text" class="form-control" id="taak" placeholder="Taak">
          </div>
          <div class="input-group mb-2">
            <label for="cono1" class="col-sm-2 text-left control-label col-form-label">Date:</label>
            <input id="date" class="form-control taskstart" placeholder="dd/mm/yyyy" type="text">
          </div>
          <div class="input-group">
            <div class="form-group" style="width:125px; margin-left:15px; margin-right:5px;">
              <label for="cono1" class="col-sm-3 text-left control-label col-form-label" style="padding-left: 0px;">Text:</label>
              <input type="text" id="ktxt" data-jscolor="" class="form-control" name="ctxt" value="" onchange="changeColor('ctxt', this.value);">
            </div>
            <div class="form-group" style="width:125px; margin-left:5px; margin-right:5px;">
              <label for="cono1" class="col-sm-3 text-left control-label col-form-label" style="padding-left: 0px;">Background:</label>
              <input type="text" id="kbg" data-jscolor="" class="form-control" name="cbg" value="" onchange="changeColor('cbg', this.value);">
            </div>
            <div class="form-group" style="width:175px; margin-left:5px;">
              <label for="cono1" class="col-sm-5 text-left control-label col-form-label" style="padding-left: 0px;">Preview:</label>
              <div id="demotaak1" data-calendar_id="3" class="form-control details" style="border-left:5px solid #959595; position:relative; height: 50px;">
                <h3 id="demotaak2" class="details-task" style="background:#959595; color:#FFFFFF">Example</h3>
                <p class="details-uren">08:00 - 16:30</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        
      </div>
      
    </div>
    
</div>
 <!-- DISPLAY MODAL: ADD --> 
<div class="modal fade" id="addMealModal" tabindex="-1" role="dialog" aria-labelledby="addMealLabel" aria-hidden="true">
  
    <div class="modal-dialog modal-dialog-centered" role="document">
    
      <div class="modal-content">
      
          <div class="modal-header">
            <h5 class="modal-title" id="addMealLabel">Add Meal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div id="modal-edit" class="modal-body">
            
            <div class="form-group row mb-2">
              <label for="cono1" class="col-md-2 text-left control-label col-form-label">Meal:</label>
              <div class="col-md-8 pl-0">
                <select name="meal_id" id="meal_id" class="w-100 form-control select2" required>
                  @foreach ($meals as $meal)
                      <option label="{{$meal->image}}" value="{{$meal->id}}"> {{$meal->name.'-'.$meal->diet}} </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="dates" class="col-md-2 text-left control-label col-form-label">Date:</label>
              <input id="dates" class="col-md-8 form-control taskstart" type="text" readonly>
            </div>
            <div class="form-group row">
                <label for="periods" class="col-md-2 text-left control-label col-form-label" >Period:</label>
                <input type="text" id="periods" class="col-md-8 form-control" name="ctxts" value="" readonly>
            </div>
            <div class="d-flex justify-content-center">
              <div class="form-group" style="width:175px; margin-left:5px;">
                <label for="cono1" class="col-sm-5 text-left control-label col-form-label" style="padding-left: 0px;">Preview:</label>
                <div id="demotaak1" data-calendar_id="3" class="form-control details" style="border-left:5px solid #959595; position:relative; height: 50px;">
                  <h3 id="demotaak2" class="details-task" style="background:#959595; color:#FFFFFF">Example</h3>
                  <p class="details-uren">08:00 - 16:30</p>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button id="addCalendar" type="button" class="btn btn-primary">Save changes</button>
            </div>
            
          </div>
      </div>
        
    </div>
      
</div>
  

  
  <!-- DISPLAY MODAL: DELETE -->
<div class="modal fade" id="deletetask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
  
        <div id="modal-delete" class="modal-body" style="text-align: center;">
        </div>
        <div class="modal-footer">
          <input id="taskdelid" type="hidden" value="">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
          <button id="confdelete" type="button" class="btn btn-danger">Yes</button>
  
        </div>
      </div>
    </div>
</div>
  <!-- partial -->
@push('scripts')
<script src='{{asset('backend/js/jquery-ui.min.js')}}'></script>
<script src='{{asset('backend/js/jscolor.min.js')}}'></script>
<script  src="{{asset('backend/js/routine.js')}}"></script>
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
    $('.select2').select2({
        templateResult: formatState,
        placeholder:"Click here",
    });
</script>
@endpush
  