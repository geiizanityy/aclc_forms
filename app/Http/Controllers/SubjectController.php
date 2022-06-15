<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subjects as Subjects;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{


    public function index()
    {
        //
        $subjects = Subjects::select('subjects.*','users.*','teachers.*')
        ->join('teachers','subjects.teacher_id','=','teachers.id')
        ->join('users','teachers.user_id','=','users.id')
        ->get();
        return SubjectResource::collection($subjects);

    }
    public function hashDemo() {
        $id = '153334';
        $hashids = new Hashids('this is salt',12,'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890');
        $id = $hashids->encode($id);
        dd($id);

    }
    public function subjectTeach($id)
    {
        $subjectTeach = Subjects::select(
            'subjects.*','users.*','teachers.*','subjects.id')
        ->join('teachers','subjects.teacher_id','=','teachers.id')
        ->join('users','teachers.user_id','=','users.id')
        ->where('subjects.teacher_id','=',$id)
        ->get();
        return SubjectResource::collection($subjectTeach);

    }
    public function fetchSelectedSubject($id) {
        $subjects = Subjects::where('subject_id', '=', $id)
        ->orderBy('subject_name', 'ASC')
        ->get();
        return SubjectResource::collection($subjects);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
        /* $subject = Subjects::findOrFail(1); */
        /* return response(new SubjectResource($subject)); */
        /* return response($id); */

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
