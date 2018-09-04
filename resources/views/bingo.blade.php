<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bingo Name</title>
<link href="{{asset('css/bingo.css')}}" rel="stylesheet">
</head>

<body>
<main class="content-wrap">
	<h1>2017年ウインターパーディー名前ビンゴ大会</h1>
	<h2>選ばれた名前のリスト</h2>
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
         	 <tbody id="player_list">
         	 @isset($selecteds)
         	 @foreach($selecteds as $player)
         		<tr>
         		<td>{{$player->name}}</td>
				@if($player->organization == "Orion_Student")
					<td>オリオン寮生</td>
				@else
					<td>健老会の方</td>
				@endif
				</tr>
			@endforeach
			@endisset					
			</tbody>	
		</table>  
		<a href="{{route('register')}}" class="button_center">Back to Insert Name</a>
	</div>
	<div class="col-wide">
		<h3>ランダムする名前:</h3>
			<p id="roll_display">&nbsp;</p>
		<button class="button_center1" id="roll">ROLL</button>
	</div>
</main>
</body>
<script type="text/javascript" src="{{asset('js/roll.js')}}"></script>
</html>