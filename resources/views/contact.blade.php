@extends('layout')

@section('content')
<div class="row">

  <div class="col-xs-12">

    <div class="panel panel-default">
      <div class="panel-heading"><h3>Send us a message</h3></div>

      <div class="panel-body">
	<form method="POST" action="//formspree.io/adam@deftnerd.com" accept-charset="UTF-8" class="form">
        <div class="form-group">
	  <label for="Your Name">Name:</label>
	  <input required="required" class="form-control" placeholder="Your name" name="name" type="text" autofocus>
        </div>
        <div class="form-group">
	  <label for="Your E-mail Address">E-mail:</label>
	  <input required="required" class="form-control" placeholder="Your e-mail address" name="email" type="text">
        </div>
        <div class="form-group">
	  <label for="Your Message">Message:</label>
	  <textarea required="required" class="form-control" placeholder="Your message" name="user_message" cols="50" rows="10"></textarea>
        </div>

        <div class="form-group">
	  <input class="button" type="submit" value="Send">
        </div>
	</form>
      </div>

    </div><!-- panel -->

  </div>
</div>
@stop
