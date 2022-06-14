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
        $subjects = Subjects::leftjoin('users','teachers.user_id', '=', 'users.id')
        ->join('students','teachers.id','=','subjects.teacher_id')
        ->orderBy('subject_name', 'ASC')
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
        //
        /* $subjects = Subjects::leftjoin('users','users.id', '=', 'teachers','teachers.user_id')
        ->orderBy('subject_name', 'ASC')
        ->get(); */
       /*  $subjects = DB::table('subjects')
        ->select('subjects.subject_code', 'subjects.subject_description', 'subjects.course', 'teachers.teacher_fname', 'teachers.teacher_mname', 'teachers.teacher_lname', 'teachers.teacher_suffix', 'teachers.teacher_id as teacher_idno', 'users.id as user_id', 'subjects.id as subject_id', 'teachers.id as teacher_id')
        ->join('teachers','subjects.teacher_id','=','teachers.id')
        ->join('users','teachers.user_id','=','users.id')
        ->get(); */
        $subjects = Subjects::select('subjects.*','users.*','teachers.*')
        ->join('teachers','subjects.teacher_id','=','teachers.id')
        ->join('users','teachers.user_id','=','users.id')
        ->get();
        return response($subjects);

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
        $subject = Subjects::findOrFail($id);
        return response(new SubjectResource($subject));

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
