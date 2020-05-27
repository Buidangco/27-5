 @extends('layout_sanpham.layoutchung')
@section('body')
	@include('trangchu.header')
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('{{url('subas/login')}}/images/bg-01.jpg');width:38%;margin-left: 20%;height: 682px;"></div>
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" method="post" action="/Home1/login1">
					@csrf
					<span class="login100-form-title p-b-59">
						Đăng nhập
					</span>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Username..." value="{{old('email')}}">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="Password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>

						</div>
						<a style="text-align:center" href="/login_kh/login_out" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							create an account
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
				  @if(isset($errors))
                <p style="color: red">
                	@foreach($errors->all() as $error)
                	    {!! $error!!}<br/>
                	@endforeach
                </p>
                @endif
                @if(isset($message))
                <p style="color: red">
                	{{$message}}
                </p>
                @endif
			</div>
		</div>
	</div>
	@include('trangchu.footer')
@stop()