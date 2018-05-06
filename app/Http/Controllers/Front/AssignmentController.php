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
        // Get all assignments that have not yet been judged
        $assignment  = \Auth::user()->no_examination();

        return view('front.assignment.index',compact('assignment'));
    }

    /**
     * Get all assignments
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allIndex()
    {

        $assignments = Assignment::with(['company:id,name','user:id,name','type:id,name'])->get()->toJson();
        return view('front.assignment.indexes',compact('assignments'));
    }

    /**
     * Method to get calendar data
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCalendarData()
    {
        // Get all examined assignments and map over them
        $data = \Auth::user()->examined_approved()->map(function($assignment){
            // Load company into the assignment onject
            $assignment->load(['company']);

            // create carbon date object from data
            $date = Carbon::createFromFormat('Y-m-d H:m:s',"{$assignment->date} {$assignment->start_time}");

            // create carbon date object from data
            $new_data = new Carbon("{$assignment->date} {$assignment->time}");

            // Fill assignment object with correct data
            $assignment->title = $assignment->company->name;
            $assignment->formatted_date = $date->toFormattedDateString();
            $assignment->start = $new_data->toDateTimeString();
            $assignment->end = $new_data->addHours(5)->toDateTimeString();
            $assignment->color = '#F13385';
            return $assignment;
        });

        // return json for javascript plugin
        return Response()->json($data);
    }

    /**
     * Method to get assignment by type
     * @param $type
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAssignmentsByType($type){
        $assignments = Assignment::getByType($type);
        return $assignments;
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Create date object from input
        $date = Carbon::createFromTimestamp($request->input('start'))->toDateString();

        // fill time variable to send to create form
        $time = $request->input('time');

        // Get all assignment types for the form
        $types = AssignmentType::all();

        return view('front.assignment.create',compact('types','date','time'));
    }

    
    public function validateAssignment(AssignmentRequest $request)
    {
        return 'true';
    }

    /**
     * Store a newly created assignment.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Merge input data with logged in user id
        $data = array_merge($request->all(),['user_id' => \Auth::user()->id]);

        // Fill rest of required data for a assignment
        $data['company_id'] = Company::where('name',$request->input('company'))->first()->id;
        $data['status_id'] = 2;
        $date = new Carbon($data['date']);
        $data['date'] = $date->toDateString();

        // Create assignment
        Assignment::create($data);

        return redirect(route('assignments.index'));
    }

    /**
     * Method to show single assignment
     * @param Assignment $assignment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Assignment $assignment)
    {
        return view('front.assignment.show',compact('assignment'));
    }

    /**
     * Method to show edit form for a assignment
     * @param Assignment $assignment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Assignment $assignment)
    {
        $types = AssignmentType::all()->toJSON();
        return view('front.assignment.edit',compact('assignment','types'));
    }

    /**
     * Method to update a assignment
     * @param Request $request
     * @param Assignment $assignment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Assignment $assignment)
    {
       $assignment->update($request->all());
       return redirect(route('assignments.edit',$assignment->id));
    }

    /**
     * Method to delete a assignment
     * @param Assignment $assignment
     * @return bool
     * @throws \Exception
     */
    public function destroy(Assignment $assignment)
    {
        if($assignment->delete()){
            return true;
        }
        return false;
    }
}
