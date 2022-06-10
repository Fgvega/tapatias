@extends('layouts.app')


@section('content')
<br>
<div class="container">
<div class="card-columns">
@foreach($publications as $publication)
<a href= "{{ route('publication_path',[$publication->slug]) }}">
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Eiche_bei_Graditz.jpg/1200px-Eiche_bei_Graditz.jpg" width="200" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $publication->title }}</h5>
        <!-- <p class="card-text">{{ $publication->description }}</p> -->
        <p class="card-text"><small class="text-muted"><b>{{ $publication->created_at }}</b></small></p>
      </div>
    </div>
  </div>
</div>
</a>
@endforeach
</div>
</div>

@endsection
