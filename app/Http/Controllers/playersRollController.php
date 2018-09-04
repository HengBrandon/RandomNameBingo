<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seleted as seleted;
use Illuminate\Support\Facades\DB;

class playersRollController extends Controller
{
    //
	private  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }
	
	public function rolltime(){
		$data = [];
		if($this->is_ajax_request()){
			$data['players'] = DB::table('players')->select('name', 'organization')->get();
			return json_encode($data);
		}else{
			$data['selecteds'] = DB::table('seleteds')->select('name', 'organization')->get();
			return view('bingo',$data);
		}
	}
	
	public function rollseleted(Request $request, seleted $seleted_player){
		$data = [];
		$data['name']=$request->input('name');
		$organization = DB::table('players')->select('organization')
												->where('name', $data['name'])
												->limit(1)
												->first();
		$data['organization'] = $organization->organization;
		$seleted_player->insert($data);
		return json_encode($data);
	}
}
