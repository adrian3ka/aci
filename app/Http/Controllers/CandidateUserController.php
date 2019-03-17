<?php

namespace App\Http\Controllers;

use App\MasterHobby;
use App\CandidateUser;
use App\Contact;
use App\User;
use Illuminate\Http\Request;

class CandidateUserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth.admin', ['except' =>
            [
                'create',
                'store'
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $candidates = CandidateUser::paginate(5);
        return view('candidate_users/index',[
            'candidates' => $candidates
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hobbies = MasterHobby::all();
        return view('candidate_users/create',[
            'hobbies' => $hobbies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $candidate_user = new CandidateUser;
        $candidate_user->name = $input['name'];
        $candidate_user->email = $input['email'];
        $candidate_user->identity_number = $input['identity_number'];
        $candidate_user->address = $input['address'];
        $candidate_user->date_of_birth = $input['date_of_birth'];
        $candidate_user->height = $input['height'];
        $candidate_user->weight = $input['weight'];
        $candidate_user->save();
        $candidate_user->hobbies()->sync($input['hobby_ids']);
        
        $contact_ids = [];
        for( $i = 0 ; $i < count($input['contact_name']); $i++) {
			$new_contact = new Contact;
			$new_contact->name = $input['contact_name'][$i];
			$new_contact->phone_number = $input['contact_phone_number'][$i];
			$new_contact->save();
			array_push($contact_ids, $new_contact->id);
		}
		
        $candidate_user->contacts()->sync($contact_ids);
		return redirect('');
    }

    public function show($id)
    {
        //
        $candidate = CandidateUser::find($id);
        return view('candidate_users/show',[
            'candidate' => $candidate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = CandidateUser::find($id);
        $candidate->delete();
        return redirect('candidate_users');
    }
    
    public function member($id) {
        $candidate = CandidateUser::find($id);
        $user = New User();
        $user->name = $candidate->name;
        $user->email = $candidate->email;
        $user->identity_number = $candidate->identity_number;
        $user->date_of_birth = $candidate->date_of_birth;
        $user->address = $candidate->address;
        $user->height = $candidate->height;
        $user->weight = $candidate->weight;
		$user->password = bcrypt('acisehat123');
		
		$user->save();
		
		echo $user;
        echo $candidate;
	}
}
