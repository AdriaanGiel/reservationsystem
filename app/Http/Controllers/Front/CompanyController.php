<?php

namespace App\Http\Controllers\Front;

use App\Company;
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
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function getCompanies(Request $request)
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            $data[$company->name] = NULL;
        }
        return Response()->json($data);
    }


}
