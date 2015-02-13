<!DOCTYPE html>
<html lang="">
	<head>
		<title>IT Q&A</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
		{{ HTML::style('/_css/bootstrap.min.css') }}
		{{ HTML::style('/_css/style.css') }}
	</head>
	<body>
		<div class="jumbotron hidden-xs">
			<div class="container">
				<h1>{{ HTML::link('/', 'Make IT Snappy Q&A') }}</h1>
				<p><small>An IT Question and Answer Portal powered by Laravel 4 ...</small></p>
			</div>
		</div>
		<!-- TOP NAV STARTS -->
			<nav class="navbar navbar-default" role="navigation">
				<section class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<span class="navbar-brand"><img class="img-responsive" src="http://lorempixel.com/150/50/nature/"></span>
					<h4 class="visible-xs">Make it Snappy</h4>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active">{{ link_to_route('questions.index', 'Home') }}</li>

						@if(!Auth::check())
							<li>{{ link_to_route('users.create', 'Register') }}</li>
							<li>{{ link_to_route('users.login', 'Login') }}</li>
						@else 
							<li>{{ link_to_route('questions.yourQuestions', 'Your Qs') }}</li>
							<li>{{ link_to_route('users.logout', 'Logout (' . Auth::user()->username .')', '', ['class' => 'logout']) }}</li>
						@endif
					</ul>
					<!-- <form class="navbar-form navbar-right" role="search"> -->
						<!-- <div class="form-group"> -->
							<!-- <input type="text" class="form-control" placeholder="Search"> -->
							{{ Form::open(['route' => ['questions.search'], 'method' => 'POST', 'class' => 'navbar-form navbar-right']) }}
							
							<div class="form-group">
								
								{{ Form::text('keyword', '', ['id' => 'keyword', 'class' => 'form-control', 'placeholder' => 'Search']) }}
							
							</div>
							
							{{ Form::token() }}
							{{ Form::submit('Submit', ['class' => 'btn btn-default']) }}
							{{ Form::close() }}

						<!-- </div> -->
						<!-- <button type="submit" class="btn btn-default">Submit</button> -->
					<!-- </form> -->
					
				</div><!-- /.navbar-collapse -->
				<!-- <span class="navbar-brand pull-right hidden-xs"><img class="img-responsive" src="http://lorempixel.com/150/50/nature/"></span> -->
				</section>
			</nav>
		<!-- TOP NAV ENDS -->

		<div id="wrap">
		
		<!-- MAIN CONTENT -->
		<div id="content" class="container clear-top">
			@yield('content')
		</div>


		<!-- FOOTER -->		
		
		</div> <!-- THIS IS END OF WRAPPER -->

		<nav class="navbar navbar-default navbar-fixed-bottom snappy_footer" role="navigation">
				 <div class="panel-footer">
				&copy; Make IT Snappy Q&A {{ date('Y') }}				
				</div>
		</nav>
		

		<!-- jQuery -->
		{{ HTML::script('/_js/jquery-2.1.0.min.js') }}
		{{ HTML::script('/_js/bootstrap.min.js') }}
		{{ HTML::script('/_js/script.js') }}
		
	</body>
</html>
