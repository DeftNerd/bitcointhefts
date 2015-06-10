@extends('layout')

@section('content')

<div class="home" id="home">
  <h1 class="pageTitle">Edit Theft</h1>

  {!! Form::model($theft, ['method' => 'PATCH', 'action' => ['TheftController@update', $theft->id]]) !!}

  <div class="form-group">
    {!! Form::label('name', 'Name: ') !!}
    {!! Form::text('name', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('started_at', 'Started At: ') !!}
    {!! Form::text('started_at', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('ended_at', 'Ended At: ') !!}
    {!! Form::text('ended_at', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('type', 'Type: ') !!}
    {!! Form::text('type', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('victims', 'Victims: ') !!}
    {!! Form::textarea('victims', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('denomination', 'Funds were denominated in: ') !!}
    {!! Form::select('denomination', array('usd' => 'USD', 'btc' => 'BTC'), 'btc') !!}
  </div>

  <div class="form-group">
    {!! Form::label('btc_then', 'BTC Then:') !!}
    {!! Form::text('btc_then', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('usd_then', 'USD Then:') !!}
    {!! Form::text('usd_then', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('transactions', 'Transactions: ') !!}
    {!! Form::textarea('transactions', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('status', 'Status: ') !!}
    {!! Form::text('status', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('description', 'Short Description: ') !!}
    {!! Form::textarea('description', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('details', 'Details: ') !!}
    {!! Form::textarea('details', null) !!}
  </div>

  <div class="form-group">
    {!! Form::label('suspects', 'Suspects: ') !!}
    {!! Form::textarea('suspects', null) !!}
  </div>

  <div class="form-group">
    {!! Form::submit('Update', ['class' => 'button']) !!}
  </div>

  <div class="form-group">
    {!! Form::close() !!}
  </div>

</div>
@endsection
