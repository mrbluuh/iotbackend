<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Message;
use App\User;

use Validator;


class MessageController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 204;

    public function getMessage()
    {
        
        $id_user = Auth::user()->id;
        $message = Message::where('id_user_to','=',$id_user)
                                ->with(['user' => function($query) {
                                    $query->select('id', 'name');
                                }])
                                ->get();
        if($message){
            return response()->json(['status' => 'success','messages'=>$message], $this->successStatus);
        }else{
            return response()->json([], $this->errorStatus);
        }
    }


    public function createMessage(Request $request)
    {
        $validData = Validator::make($request->all(), [
            'id_user_to' => 'required',
            'type_message' => 'required',
            'body' => 'required'
        ]);

        if($validData->fails()){
            return response()->json(['Error, Missing Data'],404);
        }else{
            $id_user = Auth::user()->id;
            $message = new Message;
            $message->id_user_from = $id_user;
            $message->id_user_to = $request->input('id_user_to');
            $message->id_type_message = $request->input('type_message');
            $message->status = 'FALSE';
            $message->body = $request->input('body');
            if($message->save()){
                return response()->json(['Success'=>'Message created'],200);
            }else{
                return response()->json(['Error Saving Data'],404);
            }
        }
    }


    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $message = Message::where('id','=',$id)->update(['status' => 'TRUE']);
        
        if($message){
            return response()->json(['success'=>$message],200);
        }else{
            return response()->json(['error'],404);
        }
    }

}
