<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input Name</title>
<link href="{{ asset('css/bingo.css') }}" rel="stylesheet">
</head>

<body>
<main class="content-wrap">
	<h1>2017年ウインターパーディー名前ビンゴ大会</h1>
	<h2>参加者リスト</h2>
	<div class="col-narrow">
         <table>
         	<thead>
         	  <tr>
         	    <th>名前</th>
         	    <th>所属</th>
         	  </tr>
         	 </thead>
		</table>
         <table class="stack">
         	 <tbody  id="player_list">
         	@foreach($players as $player)
         		<tr>
         		<td>{{$player->name}}</td>
				@if($player->organization == "Orion_Student")
					<td>オリオン寮生</td>
				@else
					<td>健老会の方</td>
				@endif
				</tr>
			@endforeach  
			</tbody>	
		</table>  
	</div>
	
	<div class="col-wide">
		<h3>参加者の名前を入力してください：</h3>
		<form method="POST" action="{{ route('upload_player') }}" id="myform">
		{{csrf_field()}}
			<input type="text" id="player_name" name="name" placeholder="参加者の名前">
			<select  name="organization">
				<option value="Orion_Student">オリオン寮生</option>
				<option value="Old_Peopel">健老会の方</option>
			</select>
			<small class="error">{{ $errors->first('organization') }}</small>
			<input id="submit" type="submit" class="button" value="Submit">
			<a role="button" class="button" href="{{route('roll')}}" style="padding: 14px 20px;">Go to Bingo</a>
		</form>
		<div>
			<small id = "error" style="color: red"></small>
		</div>
	</div>
</main>
</body>
<script type="text/javascript" src="{{asset('js/bingo.js')}}"></script>
</html>
