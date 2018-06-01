<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AutoAnswer;
use App\Subject;
use App\Student;
use App\Adward;
use App\StudentAdward;
use Validator;


class UserController extends Controller
{
    
    public $successStatus = 200;
    public $errorStatus = 404;

    public function getAutoAnswers(){
        $userid = Auth::user()->id;
        $answer = AutoAnswer::find($userid);
        return response()->json(['success' => $answer], $this->successStatus);
    }


    public function getUser(){
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }


    public function getSubject(){
        $id = Auth::user()->id;
        $subjects =  Subject::where('id_user','=',$id)->with(['group_grade' => function($query) { $query->select('id', 'name');}])->get();
        if(count($subjects) > 0){
            return response()->json(['status' => 'success','subjects'=>$subjects], $this->successStatus);
        }else{
            return response()->json([], $this->errorStatus);
        }
    }

    public function getStudentbyGroup($id){
        return Student::where('group_id','=',$id)->get();
    }

    public function getStudentbyUser(){
        $id = Auth::user()->id;
        return Student::where('id_user','=',$id)->with(['group' => function($query) { $query->select('id', 'name');}])->get();

    }

    public function getStudentAward($id){
        return StudentAdward::where('id_student','=',$id)->with(['adward' => function($query) { $query->select('id', 'name', 'icon');}])->get();   
    }

   
    public function getAdwards(){
        return Adward::all();
    }

    public function addAdward(Request $request){

        $validData = Validator::make($request->all(), [
            'id_student' => 'required',
            'id_adward' => 'required',
        ]);

        if($validData->fails()){
            return response()->json(['Error, Missing Data'],404);
        }else{
            $sadward = new StudentAdward;
            $sadward->id_student = $request->input('id_student');
            $sadward->id_adward = $request->input('id_adward');
            if($sadward->save()){
                return response()->json(['Success'=>'Adward added'],200);
            }else{
                return response()->json(['Error Saving Data'],404);
            }
        }

    }
}
