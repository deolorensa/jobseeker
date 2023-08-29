<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as ApiController;
use App\Http\Resources\Candidate as CandidateResource;

class CandidateController extends Controller
{
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();

        return $this->sendResponse(CandidateResource::collection($candidates), 'Candidates Retrieved Successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required',
            'phone_number' => 'required',
            'full_name' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'gender' => 'required',
            'year_exp' => 'required',
            'last_salary' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $candidate = Candidate::create($input);

        return $this->sendResponse(new CandidateResource($candidate), 'Candidate Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($candidate_id)
    {
        $candidate = Candidate::find($candidate_id);

        if (is_null($candidate)) {
            return $this->sendError('Candidate not found.');
        }

        return $this->sendResponse(new CandidateResource($candidate), 'Candidate Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required',
            'phone_number' => 'required',
            'full_name' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'gender' => 'required',
            'year_exp' => 'required',
            'last_salary' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $candidate = Candidate::find($id);
        $candidate->email = $input['email'];
        $candidate->phone_number = $input['phone_number'];
        $candidate->full_name = $input['full_name'];
        $candidate->dob = $input['dob'];
        $candidate->pob = $input['pob'];
        $candidate->gender = $input['gender'];
        $candidate->year_exp = $input['year_exp'];
        $candidate->last_salary = $input['last_salary'];
        $candidate->save();

        return $this->sendResponse(new CandidateResource($candidate), 'Candidate Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();

        return $this->sendResponse([], 'Candidate Deleted Successfully.');
    }
}
