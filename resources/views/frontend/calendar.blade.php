@extends('frontend.layouts.app')
		
{{-- <body class="post-template-default single single-post postid-53 single-format-standard evision-right-sidebar"> --}}
@section('main')
	<section class="wrapper wrap-content">
		<div class="site-content">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<form action="{{route('enrol.save')}}" method="post" enctype="multipart/form-data">@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">Your Name <span class="required">*</span></label> 
											<input id="name" name="name" type="text" value="" class="form-control" maxlength="245" required='required' />
										</div>
									</div>
									<div class="col-md-6"><label for="title">Birthday</label>
										<div class="input-group">
											<select id="title" name="birthday_month" type="text" value="" class="form-control w-50" required>
												<option value="1">January</option>
												<option value="2">February</option>
												<option value="3">March</option>
												<option value="4">April</option>
												<option value="5">May</option>
												<option value="6">June</option>
												<option value="7">July</option>
												<option value="8">August</option>
												<option value="9">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											<input name="birthday_date" type="number" size="2" class="form-control w-20" placeholder="date" required> 
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="email">Email <span class="required">*</span></label> 
											<input id="email" name="email" type="email" value="" class="form-control" maxlength="245" required='required' />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="phone">Phone <span class="required">*</span></label> 
											<input id="phone" name="phone" type="text" value="" class="form-control" maxlength="245" required='required' />
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="photo">Your picture </label> 
											<input id="photo" name="file" type="file" class="form-control" required/>
											<small class="text-muted">You can add only one image of yourself here</small>
										</div>
									</div>
									
								</div>
					
								<div class="form-group">
									<input name="type" type="hidden" id="type" value="baptism" /> 
									<input name="submit" type="submit" id="submit" class="submit" value="Enrol" /> 
								</div>
							</form>
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>
	</section>
@endsection
		
		
