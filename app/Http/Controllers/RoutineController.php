<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Meal;
use App\MealCalendar;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(request()->query('year') || request()->query('month'))
            $today = Carbon::parse($year.'-'.$month.'-1');
        else 
        $today = Carbon::today();
        $year = $today->format('Y');
        $month = $today->format('m');
        $days = [];
        for($i=1;$i<= $today->endOfMonth()->format('d');$i++){
            $days[] = Carbon::parse($year.'-'.$month.'-'.$i);
        }
        $meals = Meal::all();
        $calendars = MealCalendar::whereDate('datentime','>=',$today->startOfMonth())->whereDate('datentime','<=',$today->endOfMonth())->get();
        return view('backend.meal.routine',compact('meals','calendars','days'));
    }

    
    public function add(Request $request)
    {
        $datentime = $this->getDateTime($request->datentime,$request->period);
        $day = strtolower($datentime->format('l'));
        $calendar = MealCalendar::create(['datentime'=> $datentime,'day'=> $day,'meal_id'=> $request->meal_id,'period'=> $request->period]);
        return response()->json(['calendar_id'=> $calendar->id,'meal_name'=> $calendar->meal->name],200);
    }

    
    public function delete(Request $request)
    {
        $calendar = MealCalendar::where('id',$request->item_id)->delete();
        return response()->json(200);
    }

    
    public function update(Request $request)
    {
        $datentime = $this->getDateTime($request->datentime,$request->period);
        $day = strtolower($datentime->format('l'));
        $calendar = MealCalendar::where('id',$request->item_id)->update(['datentime'=> $datentime,'day'=> $day,'period'=> $request->period]);
        return response()->json(200);
    }
    public function getDateTime($date,$period){
        switch($period){
            case 'breakfast':$time = 11;
            break;
            case 'lunch': $time = 16;
            break;
            case 'dinner': $time = 21;
            break;
            default: $time = 12;
            break;
        }
        $format = $date.' '.$time;
        return Carbon::createFromFormat('Y-m-d H',$format);
    }

}
