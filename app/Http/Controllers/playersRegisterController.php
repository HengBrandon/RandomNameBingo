<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\player as player;
use Illuminate\Support\Facades\DB;

class playersRegisterController extends Controller
{
    //

	
	public function registerPlayers(Request $request, player $player){
		$data = [];
		$data['players'] = DB::table('players')->select('name', 'organization')->get();
		return view('input_name',$data);
	}
	
	public function postPlayers(Request $request, player $player){
		$data = [];
		$data['name'] = $request->input('name');
		$data['organization'] = $request->input('organization');
			if($request->isMethod('post')){
				$check = $this->validate(
					$request,
					[
						'name' => 'required',
						'organization' => 'required',
					]
				);
				$player->insert($data);
				return json_encode($data);
			}
	}
	
}
