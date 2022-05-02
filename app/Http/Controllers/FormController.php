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
    }


    public function create()
    {
        //
    }
    public function fetchForm() {
        $form = Form::select(DB::raw(
            'form_elements,
            form_id'
        ))->where('form_id', '=', 4)
        ->get();

        return response(new FormResource($form));
    }


    public function store(Request $request)
    {
        $form = Form::create([
            'form_elements' => json_encode($request->formElement, JSON_UNESCAPED_SLASHES)
        ]);
        return FormResource::collection($form);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
