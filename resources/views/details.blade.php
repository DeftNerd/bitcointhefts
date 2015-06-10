@extends('layout')

@section('content')
<div class="home" id="home">
  <h1 class="pageTitle">{{ !empty($theft->name) ? $theft->name : 'Untitled Incident' }}</h1>
  <dl>
    <dt>Description:</dt>
    <dd>{{ !empty($theft->description) ? $theft->description :  'We have not written a description for this incident yet'}}</dd>

    <dt>Event occured:</dt>
    <dd>
      @if ($theft->started_at && $theft->ended_at)
	between {{ $theft->started_at->toDayDateTimeString() }} and {{ $theft->ended_at->toDayDateTimeString() }}
      @elseif ($theft->started_at && !$theft->ended_at)
	{{ $theft->started_at->toDayDateTimeString() }}
      @elseif (!$theft->started_at && $theft->ended_at)
	{{ $theft->ended_at->toDayDateTimeString() }}
      @else 
        Unknown
      @endif
    </dd>

    <dt>Incident Type:</dt>
    <dd>{{ !empty($theft->type) ? $theft->type : 'The incident type has not been assigned yet' }}</dd>

    <dt>Amount in Question:</dt>
    @if ($theft->denomination === 'btc' && !empty($theft->btc_then))
      {!! '<dd>' . $theft->btc_then . ' BTC</dd>' !!}
      {!! !empty($theft->usd_then) ? '<dd>This was equal to ' . $theft->usd_then . ' USD at the time.</dd>' : '<dd>The value in USD at the time has not yet been calculated</dd>' !!}
      {!! !empty($theft->usd_now) ? '<dd>The current USD value of ' . $theft->btc_then . ' BTC is calculated to be ' . $theft->usd_now . ' as of ' . $theft->calculated_at->toDayDateTimeString() . '</dd>' : '<dd>The current value of ' . $theft->btc_then . ' BTC in USD has not yet been calculated</dd>' !!}
    @elseif ($theft->denomination === 'btc' && !empty($theft->btc_then))
      <dd>An unknown quantity of BTC was stolen</dd>
    @endif

    <dt>Details of the incident:</dt>
    <dd>{{ !empty($theft->details) ? $theft->details : 'No details are available'}}</dd>

    <dt>Victims:</dt>
    <dd>{{ !empty($theft->victims) ? $theft->victims : 'No information on victims is available'}}</dd>

    <dt>Suspects:</dt>
    <dd>{{ !empty($theft->suspects) ? $theft->suspects : 'No information about the suspects is available' }}</dd>

    <dt>Relevant Blockchain Transactions</dt>
    <dd>{{ !empty($theft->transactions) ? $theft->transactions : 'No transaction information is available'}}</dd>

    <dt>Resolution of the incident:</dt>
    <dd>{{ !empty($theft->status) ? $theft->status : 'The status of this incident is not researched yet'}}</dd>


  </dl>
  
</div>
@endsection
