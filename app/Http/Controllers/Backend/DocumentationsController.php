<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\ErrorLog;
use Session;
use App\USER;
use Validator;
use App\Repositories\FcmRepository;

class DocumentationsController extends BackendController
{
    public function __construct(FcmRepository $fcmRepo){
        parent::__construct();
        $this->fcmRepo = $fcmRepo;

    }


    public function create(Request $request){
        

        // dd($request->all()); 
       
        $data = [
            'full_name_ar' => $request->full_name_ar,
            'full_name_en' => $request->full_name_en,
            'birth_day' => $request->birth_day,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'id_number' => $request->id_number,
            'id_create_date' => $request->id_create_date,
            'id_expire_date' => $request->id_expire_date,
            'user_id' => $request->user_id,
            // 'iban' => $request->iban,
        ];

        Documentation::create($data);

        
        User::where('id', $request->user_id)->update([
            'is_documented' => 1,
            'status' => 'activated'
        ]);

        $fcm_request_user = new \stdClass;
        $fcm_request_user->title = 'حسابك';
        $fcm_request_user->body = 'تم توثيق حسابك بنجاح';
        $fcm_request_user->user_id = $request->user_id;
        $this->fcmRepo->run($fcm_request_user, 'sound');
        
        \DB::table('oauth_access_tokens')->where('user_id',$request->user_id)->delete();

        Session::flash('success','The documentation has been created successfully!');
        return redirect()->route('admin.users');
    }
    
    public function edit($user_id){
        $this->data['title'] = "Documentations user";
        $this->data['documentations'] = Documentation::where('user_id', $user_id)->with(['user'])->first();
        $this->data['documentations']->update([
            'seen' => 1
        ]);
        $this->data['user'] = USER::where('id', $user_id)->first();
        // var_dump('tets');
        // exit;
        // dd($this->data['documentations']);

        return view('admin.user.editdocumentations',$this->data);
      

    }

    public function update(Request $request,$user_id){

        // $this->data['documentations'] = Documentation::where('user_id', $user_id)->with(['user'])->frist();

        $this->validate($request,array(
            'full_name_ar' => 'required|min:3',
            // 'en_name'      => 'required|min:3',
        ));

        try {

            $documentation =  Documentation::findOrFail($user_id);
            $documentation->full_name_ar = $request->full_name_ar;
            $documentation->full_name_en = $request->full_name_en;

            $documentation->gender = $request->gender;
            $documentation->birth_day = $request->birth_day;

            $documentation->nationality = $request->nationality;
            $documentation->id_number = $request->id_number;

            $documentation->id_create_date = $request->id_create_date;
            $documentation->id_expire_date = $request->id_expire_date;
            // $documentation->iban = $request->iban;
            

            
            $documentation->save();


            Session::flash('success','The documentation has been updated successfully!');
            return redirect()->route('admin.users', ['model'=>$request->model]);
        }
        catch (Exception $exception)
        {
            Session::flash('error',$exception->getMessage());
            return back();
        }
    }
    
    // @endEdit

}
