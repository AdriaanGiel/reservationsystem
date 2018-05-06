<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\Admin\CompanyRequest;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Admin
 */
class CompanyController extends Controller
{
    /**
     * Display all companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all companies with status data and compant status and loop over them
        $companies = Company::with(['status:id,name','companyStatus:id,name'])->get()->each(function ($company){
            // Add company edit route
            $company->editRoute = route('admin.companies.edit',$company->id);
        });

        return view('admin.companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all company statuses for create form
        $statuses = Status::companyStatuses();

        return view('admin.companies.create',compact('statuses'));
    }

    /**
     * Store a newly created company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get status to approve company
        $status = Status::where('name','approved')->first();

        // Merge form data with right status id
        $data = array_merge($request->all(), ['status_id' => $status->id]);

        // Create company
        $company = Company::create($data);

        // approve company
        $company->approve();

        // add success message to flashdata
        $request->session()->flash('success-message', "Het toevoegen van het bedrijf " . $company->name . " is gelukt");

        return redirect(route('admin.companies.index'));
    }

    /**
     * Show the form for editing company.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // Get company statuses for edit form
        $statuses = Status::companyStatuses();

        return view('admin.companies.edit',compact('company','statuses'));
    }

    /**
     * @param CompanyRequest $request
     * @return string
     */
    public function validateCompany(CompanyRequest $request)
    {
        return 'true';
    }


    /**
     * Method to update company data
     * @param Request $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Company $company)
    {
        // Update company
        $company->update($request->all());

        // approve company
        $company->approve();

        // add success message to flashdata
        $request->session()->flash('success-message', "Het bewerken van bedrijf {$company->name} is gelukt.");

        return redirect(route('admin.companies.edit',$company->id));
    }


    /**
     * Controller method to delete a company
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        // Delete company
        if($company->delete()){

            // if company is deleted return old id
            return $company->id;
        }

        // If deletion dailed return error
        return \Response::json(['error' => 'Error msg'], 404);
    }
}
