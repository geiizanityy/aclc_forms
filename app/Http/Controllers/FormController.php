<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Form as Form;
use App\Http\Resources\FormResource;

use DB;

class FormController extends Controller
{
    public function index()
    {
        //
        $forms = Form::all();
        return FormResource::collection($forms);
    }


    public function create()
    {
        //
    }
    public function fetchForm() {
        $form = Form::select(DB::raw(
            'form_elements,
            form_id'
        ))->where('form_id', '=', 5)
        ->get();

        return response(new FormResource($form));
    }


    public function store(Request $request)
    {
        $form = Form::create($request->all());
        return response($form);
        /* return response()->json([
            'data' => new FormResource($form),
            'message' => 'Form successfully added'
        ],201);
        $form = Form::create([
            'form_elements' => json_encode($request->formElement, JSON_UNESCAPED_SLASHES)
        ]);
        return FormResource::collection($form); */
    }


    public function show($id)
    {
        $form = Form::where('form_id',$id)->get();
        return response(new FormResource($form));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        $form = Form::findOrFail($id);
        return response()->json([
            'message' => 'Successfully Updated',
            'data' => new FormResource($form)
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
