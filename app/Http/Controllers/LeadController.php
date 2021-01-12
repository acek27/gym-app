<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    private $validation;

    /**
     * LeadController constructor.
     */
    public function __construct()
    {
        $this->validation = [
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'interested_package' => 'sometimes',
            'phone' => 'required',
        ];
    }


    protected function index()
    {
        $leads = Lead::query()->where('branch_id', 1)
            ->orderByDesc('id')->get();
        return Inertia::render('Leads/index', ['leads' => $leads]);
    }

    protected function create()
    {
        return Inertia::render('Leads/LeadAdd');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, $this->validation);

        Lead::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'dob' => $postData['dob'],
            'phone' => $postData['phone'],
            'interested_package' => $postData['interested_package'],
            'branch_id' => 1,
            'age' => 1,
            'added_by' => Auth::user()->id,
        ]);

        return redirect()->route('lead.list');
    }

    public function view(Lead $lead)
    {
        return Inertia::render('Leads/LeadView', ['lead-prop' => $lead]);
    }

    public function update(Request $request)
    {
        $rules = $this->validation;
        $rules['id'] = 'required|exists:leads';
        $postData = $this->validate($request, $rules);

        $lead = Lead::find($postData['id']);
        $lead->update($postData);
        return redirect()->route('lead.view', ['lead' => $lead]);

    }

}
