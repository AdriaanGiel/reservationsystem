<?php

namespace App\Http\Controllers\Front;

use App\Assignment;
use App\AssignmentType;
use App\Company;
use App\Http\Requests\Front\AssignmentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignment  = \Auth::user()->no_examination();

        return view('front.assignment.index',compact('assignment'));
    }

    public function allIndex()
    {
        $assignments = Assignment::with(['company:id,name','user:id,name','type:id,name'])->get()->toJson();
        return view('front.assignment.indexes',compact('assignments'));
    }

    public function getCalendarData()
    {
        $data = \Auth::user()->examined_approved()->map(function($assignment){
            $assignment->load(['company']);
            $date = Carbon::createFromFormat('Y-m-d H:m:s',"{$assignment->date} {$assignment->start_time}");
            $new_data = new Carbon("{$assignment->date} {$assignment->time}");
            $assignment->title = $assignment->company->name;
            $assignment->formatted_date = $date->toFormattedDateString();
            $assignment->start = $new_data->toDateTimeString();
            $assignment->end = $new_data->addHours(5)->toDateTimeString();
            $assignment->color = '#F13385';
            return $assignment;
        });

        return Response()->json($data);
    }

    public function getAssignmentsByType($type){
        $assignments = Assignment::getByType($type);
        return $assignments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $date = Carbon::createFromTimestamp($request->input('start'))->toDateString();
        $time = $request->input('time');
        $types = AssignmentType::all();
        return view('front.assignment.create',compact('types','date','time'));
    }

    public function validateAssignment(AssignmentRequest $request)
    {
        return 'true';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = array_merge($request->all(),['user_id' => \Auth::user()->id]);
        $data['company_id'] = Company::where('name',$request->input('company'))->first()->id;
        $data['status_id'] = 2;
        Assignment::create($data);
        return redirect(route('assignments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        return view('front.assignment.show',compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $types = AssignmentType::all()->toJSON();
        return view('front.assignment.edit',compact('assignment','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
//        dd($request->all());
       $assignment->update($request->all());
       return redirect(route('assignments.edit',$assignment->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        if($assignment->delete()){
            return true;
        }
        return false;
    }
}
