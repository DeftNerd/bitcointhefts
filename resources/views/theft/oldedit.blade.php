@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h1>Edit theft</h1>
                        <hr/>

                        {!! Form::model($theft, ['method' => 'PATCH', 'action' => ['TheftController@update', $theft->id]]) !!}

                        <div class="form-group">
                        {!! Form::label('name', 'Name: ') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('started_at', 'Started At: ') !!}
                        {!! Form::text('started_at', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('ended_at', 'Ended At: ') !!}
                        {!! Form::text('ended_at', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('type', 'Type: ') !!}
                        {!! Form::text('type', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('victims', 'Victims: ') !!}
                        {!! Form::textarea('victims', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('amount', 'Amount in Satoshi: ') !!}
                        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('transactions', 'Transactions: ') !!}
                        {!! Form::textarea('transactions', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('status', 'Status: ') !!}
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('description', 'Description: ') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('details', 'Details: ') !!}
                        {!! Form::textarea('details', null, ['class' => 'form-control']) !!}
                    </div><div class="form-group">
                        {!! Form::label('suspects', 'Suspects: ') !!}
                        {!! Form::textarea('suspects', null, ['class' => 'form-control']) !!}
                    </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                        {!! Form::close() !!}

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
