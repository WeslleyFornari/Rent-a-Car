
@foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach


@if($errors->any())

	  	<div class="alert alert-warning">
	  		<ul class="">
	  			@foreach($errors->all() as $error)
	  			<li>{{$error}}</li>
	  			@endforeach
	  		</ul>
	  		</div>
	  	@endif