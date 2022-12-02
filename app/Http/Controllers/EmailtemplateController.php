<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Emailtemplate;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use Validator;

class EmailtemplateController extends Controller
{
    
    public function tempIndex()
    {
        return view('add');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);
        
        $saveData = [
            'user_id' => Auth::user()->id,
            'message' => $request->message,
        ];
        $res = Emailtemplate::create($saveData);
        return redirect()->back()->with('success','Template Added Successfull');
    }

    public function sendemail(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'template_id' => 'required',
            'email' => 'required',
        ])->errors();
        if (count($errors)) {
          $errors = json_decode($errors);

          if(isset($errors->template_id[0])){
            $error = $errors->template_id[0];
            return response()->json(['status' => false,'message' =>$error]);
          }
          if(isset($errors->email[0])){
            $error = $errors->email[0];
            return response()->json(['status' => false,'message' =>$error]);
          }
        }
        
        $tempID = $request->template_id;

        if($tempID){
            $tempMess = Emailtemplate::where('id',$tempID)->first();
        }
        //print_r($tempMess->message); exit();
        if ($tempMess == null) {
            return response()->json(['status'=>false,'message' => 'Template ID not exists.','data'=>[]]);
        }else{
            $data = array( 'email' => $request->get('email'), 'from' => 'laravel@gmail.com', 'subject' => 'Laravel Mail Test',  'comment' => $tempMess->message );

            $mailSend = Mail::send( 'email.sendmail', $data, function( $message ) use ($data)
            {
                $message->to( $data['email'] )->from( $data['from'], $data['comment'] )->subject( $data['subject'] );
            });
            return response()->json(['status' => true, 'message' => 'Email send Successfully!', 'data'=>array()]);
        }
        //print_r($tempMess);
        //exit();


    }

    
}
