<?php

namespace App\Http\Controllers\Front;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display all Companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all companies
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }


    /**
     * Display a single company.
     *
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Method to get all companies
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanies(Request $request)
    {
        // Get all companies
        $companies = Company::all();

        foreach ($companies as $company) {
            // Reformat array for correct json
            $data[$company->name] = NULL;
        }

        // return json
        return Response()->json($data);
    }


}
