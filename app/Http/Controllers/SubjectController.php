<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubjectResource;
use App\Models\Subjects as Subjects;
use Illuminate\Http\Request;
use Hashids\Hashids;

class SubjectController extends Controller
{
    

    public function index()
    {
        //
        $subjects = Subjects::leftjoin('users','subjects.user_id', '=', 'users.user_id')
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
        $subjects = Subjects::leftjoin('users','subjects.user_id', '=', 'users.user_id')
        ->where('users.user_id', '=', $id)
        ->orderBy('subject_name', 'ASC')
        ->get();
        return SubjectResource::collection($subjects);
    
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
