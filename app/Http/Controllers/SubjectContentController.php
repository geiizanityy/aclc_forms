<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubjectContent as SubjectContent;
use App\Http\Resources\SubjectContentResource;

use Illuminate\Support\Facades\DB as DB;

class SubjectContentController extends Controller
{
    public function index()
    {
        //
        $contents = SubjectContent::leftjoin('subjects','subject_contents.subject_id', '=', 'subjects.id')
        ->orderBy('topic_no', 'ASC')
        ->get();
        return SubjectContentResource::collection($contents);
    }

    public function getSubjectContent($id)
    {
        //
        $contents = SubjectContent::select('subjects.*','subject_contents.*','subject_contents.id')
        ->join('subjects','subject_contents.subject_id', '=', 'subjects.id')
        ->where('subject_contents.id','=','t255a781')
        ->orderBy('topic_no', 'ASC')
        ->get();
        return SubjectContentResource::collection($contents);
    }

    public function show($id)
    {
        $contents = SubjectContent::where('id',$id)->get();
        return SubjectContentResource::collection($contents);
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
        $content = SubjectContent::create($request->all());
        return new SubjectContentResource($content);
        /* return response()->json([
            'data' => new FormResource($form),
            'message' => 'Form successfully added'
        ],201);
        $form = Form::create([
            'form_elements' => json_encode($request->formElement, JSON_UNESCAPED_SLASHES)
        ]);
        return FormResource::collection($form); */
    }
    public function update(Request $request, $id)
    {
        //$this->validation($request);

        $content = SubjectContent::findOrFail($id);
        $content->topic_content = $request->topic_content;
        $content->save();

        return new SubjectContentResource($request);
    }


    public function edit($id)
    {
        //
    }


    /* public function update(Request $request, $id)
    {
        //
        $form = Form::findOrFail($id);
        return response()->json([
            'message' => 'Successfully Updated',
            'data' => new SubjectContentResource($form)
        ]);
    } */

    public function destroy($id)
    {
        //
    }
}
