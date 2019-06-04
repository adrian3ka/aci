<?php

namespace App\Http\Controllers;

use App\User;
use App\Contact;
use App\MasterHobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const DEFAULT_PAGE_SIZE = 10;
    public function __construct()
    {
        $this->middleware('auth.admin', ['except' =>
            [
                'create',
                'store'
            ]
        ]);
    }
    
    public function index(Request $request)
    {
        $input = $request->all();
        $page_size = self::DEFAULT_PAGE_SIZE;
        $key = "";
        $month = 0;
        
        if (isset($input['page_size'])) {
			$page_size = $input['page_size'];
		}
        
        if (!isset($input['key'])) {
            $users = DB::table('users');
	    } else {
			$key = $input['key'];
            $users = User::where('name', 'like', '%' . $input['key'] . '%');
		}
		
		if (isset($input['month'])) {
			$month = $input['month'];
			$users = $users->whereMonth('date_of_birth','=',$month);
		}
		$users = $users->paginate($page_size);
        return view('users/index',[
            'users' => $users->appends($input),
            'page_size' => $page_size,
            'key' => $key,
            'month' => $month,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('users/show',[
            'user' => $user
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
        $user = User::find($id);
        $hobbies = MasterHobby::all();
        return view('users/edit',[
            'user' => $user,
            'hobbies' => $hobbies
        ]);
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
        $user = User::find($id);
        $input = $request->all();
        $user->contribution = $input['contribution'];
        
        $user->name = $input['name'];
        $user->gender = $input['gender'];
        $user->birth_place = $input['birth_place'];
        $user->cellphone = $input['cellphone'];
        $user->birth_place = $input['birth_place'];
        $user->email = $input['email'];
        $user->identity_number = $input['identity_number'];
        $user->address = $input['address'];
        $user->date_of_birth = $input['date_of_birth'];
        $user->height = $input['height'];
        $user->weight = $input['weight'];
        $user->blood_type = $input['blood_type'];
        
        
        if (isset($input['hobby_ids'])) {
            $user->hobbies()->sync($input['hobby_ids']);
        }
                
        $contact_ids = [];
        for( $i = 0 ; $i < count($input['contact_name']); $i++) {
			$new_contact = new Contact;
			$new_contact->name = $input['contact_name'][$i];
			$new_contact->phone_number = $input['contact_phone_number'][$i];
			$new_contact->relation = $input['relation'][$i];
			$new_contact->save();
			array_push($contact_ids, $new_contact->id);
		}
		
        $user->contacts()->sync($contact_ids);
        $user->save();
        
        return back()->with('success','Successfully Update User Information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('users');
    }
}
