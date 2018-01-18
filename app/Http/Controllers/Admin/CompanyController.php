<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\Admin\CompanyRequest;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::with(['status:id,name','companyStatus:id,name'])->get()->each(function ($company){
            $company->editRoute = route('admin.companies.edit',$company->id);
        });

        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::companyStatuses();
        return view('admin.companies.create',compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Status::where('name','approved')->first();
        $data = array_merge($request->all(), ['status_id' => $status->id]);
        $company = Company::create($data);
        $company->approve();

        return redirect(route('admin.companies.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $statuses = Status::companyStatuses();
        return view('admin.companies.edit',compact('company','statuses'));
    }

    public function validateCompany(CompanyRequest $request)
    {
        return 'true';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        $company->update($request->all());
        $company->approve();
        $request->session()->flash('success-message', "Het bewerken van bedrijf {$company->name} is gelukt.");
        return redirect(route('admin.companies.edit',$company->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->delete()){
            return $company->id;
        }
        return \Response::json(['error' => 'Error msg'], 404);
    }
}
