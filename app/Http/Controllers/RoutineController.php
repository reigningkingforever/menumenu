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
        $calendars = MealCalendar::whereDate('start_at','>=',$today->startOfMonth())->whereDate('end_at','<=',$today->endOfMonth())->get();
        return view('backend.meal.routine',compact('meals','calendars','days'));
    }

    
    public function add(Request $request)
    {
        $start_at = $this->getStartDateTime($request->startend,$request->period);
        $end_at = $this->getEndDateTime($request->startend,$request->period);
        $day = strtolower($start_at->format('l'));
        // if($start_at->format('m') > now()->format('m'))
        $calendar = MealCalendar::create(['start_at'=> $start_at,'end_at'=> $end_at,'day'=> $day,'meal_id'=> $request->meal_id,'period'=> $request->period]);
        return response()->json(['calendar_id'=> $calendar->id,'meal_name'=> $calendar->meal->name],200);
    }

    
    public function delete(Request $request)
    {
        $calendar = MealCalendar::where('id',$request->item_id)->where('start_at','>',now())->delete();
        return response()->json(200);
    }

    
    public function update(Request $request)
    {
        $start_at = $this->getStartDateTime($request->startend,$request->period);
        $end_at = $this->getEndDateTime($request->startend,$request->period);
        $day = strtolower($start_at->format('l'));
        if($start_at->format('m') > now()->format('m'))
        $calendar = MealCalendar::where('id',$request->item_id)->update(['start_at'=> $start_at,'end_at'=> $end_at,'day'=> $day,'period'=> $request->period]);
        return response()->json(200);
    }
    public function getStartDateTime($date,$period){
        switch($period){
            case 'breakfast':$time = 6;
            break;
            case 'lunch': $time = 11;
            break;
            case 'dinner': $time = 16;
            break;
            default: $time = 6;
            break;
        }
        $format = $date.' '.$time;
        return Carbon::createFromFormat('Y-m-d H',$format);
    }
    public function getEndDateTime($date,$period){
        switch($period){
            case 'breakfast':$time = 11;
            break;
            case 'lunch': $time = 16;
            break;
            case 'dinner': $time = 21;
            break;
            default: $time = 21;
            break;
        }
        $format = $date.' '.$time;
        return Carbon::createFromFormat('Y-m-d H',$format);
    }

}
