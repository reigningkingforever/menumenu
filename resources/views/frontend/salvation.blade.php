@extends('frontend.layouts.app')
@push('styles')
	
@endpush

@section('main')
	<section class="wrapper wrap-content">
		<div class="site-content">
			<div class="row">
				<div class="col-md-8">
					<div class="card">					
						{{-- <img src="{{asset('frontend/img/sec.jpg')}}" class="card-img-top img-fluid" alt="" loading="lazy" /> --}}
						<div class="card-body">
							<h1>Prayer of Salvation</h1>
							<hr>
							<div class="mt-3">
								<p>The Lord Jesus is coming back very soon. In fact it is sooner than we used to know in the previous years. 
									All the end-time signs which Jesus told us would happen before his return are daily playing out 
									before our eyes.</p>	
								<p>
									He told us the saints will be raptured to heaven to escape the terror of the AntiChrist and therefore 
									the judgement of God upon the earth will no man will escape. In light of this, we implore you to make Jesus
									Christ the Lord of your life today, so that you might be counted worthy together with all the saints of God
									that will be raptured to Heaven.
								</p>
								<p>If you would like to let Jesus Christ be the Lord of your life from today onwards, you can pray this prayer below with
									all of your heart:<br>
									<blockquote class="text-dark">"O Lord God, I believe with all my heart in Jesus Christ, Son of the living God. I believe
										He died for me and God raised Him from the dead. I believe He's alive today. I confess with my mouth
										that Jesus Christ is Lord of my life from this day. Through Him and in His name, I have eternal life;
										I'm born again. Thank you Lord for saving my soul!. I'm now a child of God.
										Halleluyah!"
									</blockquote>
								</p>

							</div>
							<div>
								<p>If you prayed that prayer above, you should know that you are now indeed a child of God and the maker of the 
									whole universe is now your father.
									<span class="d-block border border-dark mt-2 mx-4"></span>
								</p>
									
								<p>
									Please let us know you by filling the form below. We have a free e-book gift for you titled "Now that you're born again"
									from the man of God Pastor Chris Oyakhilome. This book will help you  to get you started in your journey of the new life you have now
									received in Christ. 
								</p>
							</div>
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
									<input name="type" type="hidden" id="type" value="salvation" /> 
									<input name="submit" type="submit" id="submit" class="submit" value="Submit" /> 
								</div>
							</form>
							
						</div>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<h4>Free Download</h4>
							
						</div>
						<img src="{{asset('frontend/img/born-again.jpg')}}" class="w-100">
						<div class="card-body">
							<p>Click to download e-book</p>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
@endsection
@push('scripts')
	
@endpush