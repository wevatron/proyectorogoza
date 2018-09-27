@if(count($errors))

	@foreach($errors->all() as $error)
	</br>
	<a class="waves-effect waves-light btn red darken-4 pulse">{{$error}}</br></a>
	@endforeach
	</br>

@endif
