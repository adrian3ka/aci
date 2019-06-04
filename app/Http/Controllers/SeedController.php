<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    //
    public function seed() {
		App\User::firstOrCreate([
		    'name' => 'Lidia Christiani',
		    'email' => 'lidia@gmail.com',
		    'password' => bcrypt('123123'),
		    'identity_number' => '1901524585',
		    'date_of_birth' => '1965-12-21',
		    'address' => 'Jl. Kranggan 70',
		    'height' => 165,
		    'weight' => 65,
		    'blood_type' => 'B'
		]);
		
		App\MasterHobby::firstOrCreate(['name' => 'Menyanyi']);
		App\MasterHobby::firstOrCreate(['name' => 'Menari']);
		App\MasterHobby::firstOrCreate(['name' => 'Olahraga']);
		App\MasterHobby::firstOrCreate(['name' => 'Melukis']);
		App\MasterHobby::firstOrCreate(['name' => 'Memasak']);
		return redirect('home');
	}
}
