@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="features">
	<div class="container">
	  	<div class="section-title text-center">
			<h2>CHECKOUT</h2>
	  	</div>
		<div class="row">	
			<div class="col-md-8 order-md-1">
				<h4 class="mb-3">Billing address</h4>
				<form class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">First name</label>
							<input type="text" class="form-control" id="firstName" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" class="form-control" id="lastName" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>
		
					<div class="mb-3">
						<label for="email">Email <span class="text-muted">(Optional)</span></label>
						<input type="email" class="form-control" id="email" placeholder="you@example.com">
						<div class="invalid-feedback">
						Please enter a valid email address for shipping updates.
						</div>
					</div>
		
					<div class="mb-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
						<div class="invalid-feedback">
						Please enter your shipping address.
						</div>
					</div>
			
					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">State</label>
							<select class="form-control w-100" id="country" required>
								<option value="">Choose...</option>
								<option value="lagos" selected>Lagos</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid country.
							</div>
						</div>
						<div class="col-md-4 mb-3">
						<label for="state">Town</label>
						<select class="form-control d-block w-100" id="state" required>
							<option value="">Choose...</option>
							<option value="ajah">Ajah</option>
							<option value="lekki">Lekki</option>
							<option value="ikeja">Ikeja</option>
							<option value="ikorodu">Ikorodu</option>
							<option value="surulere">Surulere</option>
							<option value="victoria_island">Victoria Island</option>
						</select>
						<div class="invalid-feedback">
							Please provide a valid state.
						</div>
						</div>
						<div class="col-md-3 mb-3">
						<label for="zip">Zip</label>
						<input type="text" class="form-control" id="zip" placeholder="" required>
						<div class="invalid-feedback">
							Zip code required.
						</div>
						</div>
					</div>

					<hr class="mb-4">
					
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="save-info">
						<label class="custom-control-label" for="save-info">Save this information for next time</label>
					</div>
					<hr class="mb-4">
			
					
					
				</form>
			</div>
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
					<span class="badge badge-secondary badge-pill">3</span>
				</h4>
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">Product name</h6>
						<small class="text-muted">Brief description</small>
					</div>
					<span class="text-muted">₦12</span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">Second product</h6>
						<small class="text-muted">Brief description</small>
					</div>
					<span class="text-muted">₦8</span>
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">Third item</h6>
						<small class="text-muted">Brief description</small>
					</div>
					<span class="text-muted">₦5</span>
					</li>
					<li class="list-group-item d-flex justify-content-between bg-light">
					<div class="text-success">
						<h6 class="my-0">Promo code</h6>
						<small>EXAMPLECODE</small>
					</div>
					<span class="text-success">-₦5</span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
					<span>Total (USD)</span>
					<strong>₦20</strong>
					</li>
				</ul>
			
				<form class="card p-2">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Promo code">
						<div class="input-group-addon">
							<button type="submit" class="btn btn-secondary btn-xs py-0">Redeem</button>
						</div>
					</div>
				</form>
				<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
			</div>
		</div>
	</div>
</div>
@endsection