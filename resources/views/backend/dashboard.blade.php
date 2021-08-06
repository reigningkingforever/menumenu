@extends('backend.layouts.app')
@section('main')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">Email Statistics</h4>
                        <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Bounce
                            <i class="fa fa-circle text-warning"></i> Unsubscribe
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Users Behavior</h4>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartHours" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Open
                            <i class="fa fa-circle text-danger"></i> Click
                            <i class="fa fa-circle text-warning"></i> Click Second Time
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">2017 Sales</h4>
                        <p class="card-category">All products including Taxes</p>
                    </div>
                    <div class="card-body ">
                        <div id="chartActivity" class="ct-chart"></div>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-info"></i> Tesla Model S
                            <i class="fa fa-circle text-danger"></i> BMW 5 Series
                        </div>
                        <hr>
                        <div class="stats">
                            <i class="fa fa-check"></i> Data information certified
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card  card-tasks">
                    <div class="card-header ">
                        <h4 class="card-title">Activities</h4>
                        <p class="card-category">Backend development</p>
                    </div>
                    <div class="card-body ">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="bg-primary text-white rounded-circle p-2"><i class="fa fa-bell-o"></i></div>
                                        </td>
                                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Mark as Read" class="btn btn-success btn-simple btn-link">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <div class="bg-info text-white rounded-circle p-2"><i class="fa fa-shopping-cart"></i></div>
                                        </td>
                                        <td>Payment made for <a href="#">order 23456</a> </td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Mark as Read" class="btn btn-success btn-simple btn-link">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="bg-info text-white rounded-circle p-2"><i class="fa fa-shopping-cart"></i></div>
                                        </td>
                                        <td>New Order. Click here to view <a href="#">Oluwadamilola Idera</a></td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Mark as Read" class="btn btn-success btn-simple btn-link">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<!--  Full Calendar   -->
<script src="{{asset('backend/js/plugins/fullcalendar.min.js')}}"></script>
 <!--  Chartist Plugin  -->
<script src="{{asset('backend/js/plugins/chartist.min.js')}}"></script>
 <!--  Notifications Plugin    -->
<script type="text/javascript">
     $(document).ready(function() {
         // Javascript method's body can be found in assets/js/demos.js
         demo.initDashboardPageCharts();
 
         demo.showNotification();
 
     });
 </script>
@endpush