@extends('layout.outerlayout')

@section('content')
<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

					<!--begin::Aside-->
					<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(assets/media//bg/bg-4.jpg);">
						<div class="kt-grid__item">
							<a href="#" class="kt-login__logo">
								<h1>GRANTS APP</h1>
							</a>
						</div>
						<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
							<div class="kt-grid__item kt-grid__item--middle">
								<h3 class="kt-login__title">The Grants App administrator will be able to login to the application.</h3>
								<h4 class="kt-login__subtitle"> Administrator Login and Manage the Grants App Admin </h4>
							</div>
						</div>
						<div class="kt-grid__item">
							<div class="kt-login__info">
								<div class="kt-login__copyright">
									&copy 2020 Webgarh Solutions Pvt Ltd
								</div>
								<!-- <div class="kt-login__menu">
									<a href="#" class="kt-link">Privacy</a>
									<a href="#" class="kt-link">Legal</a>
									<a href="#" class="kt-link">Contact</a>
								</div> -->
							</div>
						</div>
					</div>

					<!--begin::Aside-->

					<!--begin::Content-->
					<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

						<!--begin::Head-->
						<!-- <div class="kt-login__head">
							<span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
							<a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
						</div> -->

						<!--end::Head-->

						<!--begin::Body-->
						<div class="kt-login__body">

							<!--begin::Signin-->
							<div class="kt-login__form">
								<div class="kt-login__title">
									<h3>Admin Login</h3>
								</div>

								<!--begin::Form-->
								<form method="POST" class="kt-form" action="{{ route('login') }}">
                        @csrf

                       <div class="form-group">
                            

                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                             @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="col">
                                <label class="kt-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                             Remember me
                                                <span></span>
                                            </label>
                                        </div>
                                
                        </div>
                                    <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary btn btn-primary" style="height: 40px !important;">
                                    {{ __('Login') }}
                                </button>

                               
                           
                        </div>

                    </form>

								<!--end::Form-->

								<!--begin::Divider-->
								<!-- <div class="kt-login__divider">
									<div class="kt-divider">
										<span></span>
										<span>OR</span>
										<span></span>
									</div>
								</div> -->

								<!--end::Divider-->

								<!--begin::Options-->
								<!-- <div class="kt-login__options">
									<a href="#" class="btn btn-primary kt-btn">
										<i class="fab fa-facebook-f"></i>
										Facebook
									</a>
									<a href="#" class="btn btn-info kt-btn">
										<i class="fab fa-twitter"></i>
										Twitter
									</a>
									<a href="#" class="btn btn-danger kt-btn">
										<i class="fab fa-google"></i>
										Google
									</a>
								</div> -->

								<!--end::Options-->
							</div>

							<!--end::Signin-->
						</div>

						<!--end::Body-->
					</div>

					<!--end::Content-->
				</div>
			</div>
		</div>

@endsection
