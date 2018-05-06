<?php

namespace App\Http\Controllers\Admin;

use App\Assignment;
use App\AssignmentType;
use App\Company;
use App\Http\Requests\Admin\AssignmentRequest;
use App\Status;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function MongoDB\BSON\toJSON;

class AssignmentController extends Controller
{
    /**
     * Display all assignment
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assignment with company, type and user
        $assignments = Assignment::with(['company:id,name', 'type:id,name', 'user:id,name'])->latest()->get();

        return view('admin.assignment.index', compact('assignments'));
    }


    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all companies that are approved
        $companies = Company::withStatus('approved');

        // Get all assignment types
        $types = AssignmentType::all();

        return view('admin.assignment.create', compact('companies', 'types'));
    }

    /**
     * Store a newly created assignment.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get email from input
        $email = trim(explode("-", $request->input('user'))[1]);

        // Get company from database
        $company = Company::where('name', $request->input('company'))->first();

        // Get user matched with email
        $user = User::where('email', $email)->first();

        // Get correct status
        $status = Status::where('name', 'approved')->first();

        // Create new carbon date object
        $date = new Carbon($request->date);

        // Merge correct data with assignment data
        $data = array_merge($request->all(), [
            'user_id' => $user->id,
            'company_id' => $company->id,
            'status_id' => $status->id
        ]);

        $data['date'] = $date->toDateString();

        Assignment::create($data);

        // add success message to flashdata
        $request->session()->flash('success-message', "Het toevoegen van een nieuwe afspraak is gelukt");

        return redirect(route('admin.assignments.index'));
    }

    /**
     * Display the assignment.
     *
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        // Load all objects in array into the assignment object
        $assignment->load(['user', 'company', 'status', 'type']);

        // Reformat date
        $assignment->formatted_date = Carbon::createFromFormat("Y-m-d", $assignment->date)->toFormattedDateString();

        return view('admin.assignment.show', compact('assignment'));
    }

    public function validateAssignment(AssignmentRequest $request)
    {
        return 'true';
    }

    /**
     * Show the form for editing assignment.
     *
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        // Reformat date
        $assignment->formatted_date = Carbon::createFromFormat("Y-m-d", $assignment->date)->toFormattedDateString();

        // Get all approved companies
        $companies = Company::withStatus('approved');

        // Get all assignment types
        $types = AssignmentType::all();

        // Get correct statuses
        $statuses = Status::standardStatuses();

        return view('admin.assignment.edit', compact('assignment', 'companies', 'types', 'statuses'));
    }

    /**
     * Update assignment.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $assignment->update($request->all());
        return redirect(route('admin.assignments.show', $assignment->id));
    }

    /**
     * Method to judge assignment
     * @param Request $request
     * @param Assignment $assignment
     * @return $this
     */
    public function judgeAssignments(Request $request, Assignment $assignment)
    {
        $assignment->judge($request->input('judgement'));

        return $assignment->load(['status']);
    }


    /**
     * Method to delete a assignment
     * @param Assignment $assignment
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function destroy(Assignment $assignment)
    {
        if ($assignment->delete()) {
            return $assignment->id;
        }
        return \Response::json(['error' => 'Error msg'], 404);
    }
}
