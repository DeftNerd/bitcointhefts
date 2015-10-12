@extends('layout')
@section('content')

<div class="home" id="home">
  <h3 class="pageTitle">Significant bitcoin thefts and losses</h3>
  @if (Auth::check())
    <div>
      <a class="button" href="{{ URL::to('/thefts/create') }}">Create New Entry</a>
    </div>
  @endif

  <dl>
  @forelse($thefts as $theft)
    <dt>
      <a class="post-link" href="/details/{{ $theft->slug }}">{{ $theft->name }}</a> - 
      @if ($theft->denomination=='btc')
        {{ $theft->btc_then }} BTC
      @elseif ($theft->denomination=='usd')
	{{ $theft->usd_then }} USD
      @endif

      @if ($theft->type)
        {{ $theft->type }}
      @endif
      @if ($theft->started_at && $theft->ended_at)
	(between {{ $theft->started_at->toFormattedDateString() }} and {{ $theft->ended_at->toFormattedDateString() }})
      @elseif ($theft->started_at && !$theft->ended_at)
	(begun {{ $theft->started_at->toFormattedDateString() }})
      @elseif (!$theft->started_at && $theft->ended_at)
	(occured {{ $theft->ended_at->toFormattedDateString() }})
      @endif

    </dt>
    <dd>{{ $theft->description }}</dd>
    @if (Auth::check())
    <dd>
      {!! Form::open(['url'=>'/thefts/'.$theft->slug, 'method'=>'delete']) !!}
      <a href="/thefts/{{$theft->slug}}/edit" class="button">Edit</a>
      <button type="submit" class="button">Delete</button>
      {!! Form::close() !!}
    </dd>
    @endif
  @empty
    <dt>No Thefts Found</dt>
    <dd>Something must have gone wrong.</dd>
  @endforelse
  </dl>
  @if (Auth::check())
    <div>
      <a class="button" href="{{ URL::to('/thefts/create') }}">Create New Entry</a>
    </div>
  @endif


</div>

@stop

