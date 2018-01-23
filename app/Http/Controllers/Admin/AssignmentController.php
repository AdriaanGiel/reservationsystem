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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::with(['company:id,name', 'type:id,name', 'user:id,name'])->latest()->get();
        return view('admin.assignment.index', compact('assignments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::withStatus('approved');
        $types = AssignmentType::all();
        return view('admin.assignment.create', compact('companies', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = trim(explode("-", $request->input('user'))[1]);
        $company = Company::where('name', $request->input('company'))->first();
        $user = User::where('email', $email)->first();
        $status = Status::where('name', 'approved')->first();

        $date = new Carbon($request->date);

        $data = array_merge($request->all(), [
            'user_id' => $user->id,
            'company_id' => $company->id,
            'status_id' => $status->id
        ]);

        $data['date'] = $date->toDateString();

        Assignment::create($data);

        $request->session()->flash('success-message', "Het toevoegen van een nieuwe afspraak is gelukt");

        return redirect(route('admin.assignments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $assignment->load(['user', 'company', 'status', 'type']);
        $assignment->formatted_date = Carbon::createFromFormat("Y-m-d", $assignment->date)->toFormattedDateString();

        return view('admin.assignment.show', compact('assignment'));
    }

    public function validateAssignment(AssignmentRequest $request)
    {
        return 'true';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        $assignment->formatted_date = Carbon::createFromFormat("Y-m-d", $assignment->date)->toFormattedDateString();
        $companies = Company::withStatus('approved');
        $types = AssignmentType::all();
        $statuses = Status::standardStatuses();
        return view('admin.assignment.edit', compact('assignment', 'companies', 'types', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $assignment->update($request->all());
        return redirect(route('admin.assignments.show', $assignment->id));
    }

    public function judgeAssignments(Request $request, Assignment $assignment)
    {
        $assignment->judge($request->input('judgement'));
        return $assignment->load(['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        if ($assignment->delete()) {
            return $assignment->id;
        }
        return \Response::json(['error' => 'Error msg'], 404);
    }
}
