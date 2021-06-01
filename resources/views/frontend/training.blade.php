@extends('frontend.layouts.app')
@push('styles')

@endpush
		
{{-- <body class="post-template-default single single-post postid-53 single-format-standard evision-right-sidebar"> --}}
@section('main')
	<section class="wrapper wrap-content">
		<div class="site-content">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<div class="accordions" id="accordion">
								<div class="card">
									<button data-target="#collapseOne" href="#" data-toggle="collapse" class="collapsed p-0" aria-expanded="false">
									<div class="card-header">
										<h6 class="card-title">Click here to let us know your giving</h6>
									</div>
									</button>
									<div id="collapseOne" class="card-collapse collapse" style="">
										<div class="card-body">
											<form action="{{route('giving.save')}}" method="post" enctype="multipart/form-data">@csrf
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="name">Your Name <span class="required">*</span></label> 
															<input id="name" name="name" type="text" value="" class="form-control" maxlength="245" required='required' />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="title">Purpose</label>
															<select id="purpose" name="purpose" class="form-control" required>
																<option>Tithe</option>
																<option>Offering</option>
																<option>First Fruit</option>
																<option>Seed</option>
																<option>Rhapsody of Realities Partnership</option>
																<option>Rhapsody Bible Partnership</option>
																<option>Healing School Partnership</option>
																<option>Innercity Missions Partnership</option>
																<option>Loveworld Television Ministry Partnership</option>
																<option>Loveworld USA Partnership</option>
																<option>Loveworld Media Partnership</option>
																<option>Loveworld Radio Partnership</option>
																<option>Internet Multimedia Partnership</option>
																<option>Loveworld Publishing Partnership</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="amount">Amount <span class="required">*</span></label> 
															<input id="amount" name="amount" type="number" placeholder="5000" class="form-control" maxlength="245" required='required' />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="title">Currency</label>
															<select id="currency" name="currency" class="form-control" required>
																<option>Euro</option>
																<option>Pounds</option>
																<option>Dollars</option>
																<option>Others</option>
																
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<textarea class="form-control" name="description" cols="45" rows="8" placeholder="Details of your giving or prayer request" required="required"></textarea>
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
															<label for="photo">Proof of Transaction </label> 
															<input id="photo" name="file" type="file" class="form-control" required/>
															<small class="text-muted">You may only upload one document</small>
														</div>
													</div>
													
												</div>
									
												<div class="form-group">
													<input name="type" type="hidden" id="type" value="foundationschool" /> 
													<input name="submit" type="submit" id="submit" class="submit" value="Enrol" /> 
												</div>
											</form>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>
	</section>
@endsection
		
		
