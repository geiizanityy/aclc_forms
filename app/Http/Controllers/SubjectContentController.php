<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubjectContent as SubjectContent;
use App\Http\Resources\SubjectContentResource;

use DB;

class SubjectContentController extends Controller
{
    public function index()
    {
        //
        $forms = SubjectContent::leftjoin('subjects','subject_contents.subject_id', '=', 'subjects.subject_id')
        ->orderBy('topic_no', 'ASC')
        ->get();
        return SubjectContentResource::collection($forms);
    }


    public function create()
    {
        //
    }
    public function fetchForm() {
        $form = SubjectContent::select(DB::raw(
            'topic_content,
            subjectcontent_id'
        ))->where('subjectcontent_id', '=', 5)
        ->get();

        return response(new SubjectContentResource($form));
    }


    public function store(Request $request)
    {
        $form = SubjectContent::create($request->all());
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
        $form = SubjectContent::where('subjectcontent_id',$id)->get();
        return response(new SubjectContentResource($form));
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
            'data' => new SubjectContentResource($form)
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
