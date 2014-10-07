@extends('layouts.default')

@section('content')
	
	<div class="jumbotron">
		<h1>Welcome to Cuitter!</h1>
		<p>
			Tempat lu buat cuit cuit sepuasnya. Kenapa gak daftar aja untuk bisa liat orang cuit - cuit soal apa ?
		</p>

		@if (!$currentUser)
			<p>
				{{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}
			</p>
		@endif
	</div>

@stop