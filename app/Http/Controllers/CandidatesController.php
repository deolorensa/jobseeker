<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Flasher\Notyf\Prime\NotyfFactory;
class CandidatesController extends Controller
{
    public function index() {
        $candidates = Candidate::orderBy('full_name')->get();
        return view('index', compact('candidates'));
    }

    public function create() {
        return view('add');
    }

    public function store(Request $request) {
        $rules = [
            'email' => 'required|unique:candidates',
            'phone_number' => 'required|unique:candidates|max:13',
            'full_name' => 'required|string',
            'dob' => 'required',
            'pob' => 'required|string',
            'gender' => 'required',
            'year_exp' => 'required|max:2',
            'last_salary' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute harus diisi',
        ];


        $this->validate($request, $rules, $customMessages);

        // Request value upload to DB
        $requestValue = $request->all();

        Candidate::create($requestValue);
        noty()->addSuccess('Candidate Data Successfully Created.');
        return to_route('candidate.index');
    }

    public function edit(Request $request) {
        $candidate = Candidate::find($request->id);
        return view('edit', compact('candidate'));
    }

    public function update(Request $request) {
        $rules = [
            'email' => 'required',
            'phone_number' => 'required|max:13',
            'full_name' => 'required|string',
            'dob' => 'required',
            'pob' => 'required|string',
            'gender' => 'required',
            'year_exp' => 'required|max:2',
            'last_salary' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute harus diisi',
        ];

        $this->validate($request, $rules, $customMessages);

        $department = Candidate::find($request->id);

        // Request value upload to DB
        $requestValue = $request->all();

        $department->update($requestValue);
        noty()->addSuccess('Candidate Data Successfully Updated.');
        return to_route('candidate.index');
    }

    public function destroy(Request $request) {
        $quotes = Candidate::find($request->id);

        $quotes->delete();
        noty()->addSuccess('Candidate Data Successfully Deleted.');
        return to_route('candidate.index');
    }
}
