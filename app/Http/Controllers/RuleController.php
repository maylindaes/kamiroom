<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::latest()->get();

        return view(
            'admin.rules.index',
            compact('rules')
        );
    }

    public function create()
    {
        return view(
            'admin.rules.create'
        );
    }

    public function store(Request $request)
    {
        Rule::create([
            'isi' => $request->isi
        ]);

        return redirect(
            '/admin/rules'
        );
    }

    public function edit($id)
    {
        $rule = Rule::findOrFail($id);

        return view(
            'admin.rules.edit',
            compact('rule')
        );
    }

    public function update(Request $request, $id)
    {
        $rule = Rule::findOrFail($id);

        $rule->update([

            'isi' => $request->isi
        ]);

        return redirect(
            '/admin/rules'
        );
    }

    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);

        $rule->delete();

        return redirect(
            '/admin/rules'
        );
    }
}