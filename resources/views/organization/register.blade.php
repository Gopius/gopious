<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Registration Page | Go pius</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="/assets/css/pages/wizard/wizard-5.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="/assets/media/logos/favicon.png" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Container-->
				
					<!--begin::Card-->
					<div class="card card-custom w-100">
						<!--begin::Card Body-->
						<div class="card-body p-0">
							<!--begin::Wizard 5-->
							<div class="wizard wizard-5 d-flex flex-column flex-lg-row flex-row-fluid" id="kt_wizard">
								<!--begin::Aside-->
								<div class="wizard-aside bg-white d-flex flex-column flex-row-auto w-100 w-lg-300px w-xl-400px w-xxl-500px">
									<!--begin::Aside Top-->
									<div class="d-flex  flex-column px-xxl-30 px-10">
										<!--begin::Logo-->
										<a href="#" class="text-center pt-2 mt-10">
											<img src="/assets/media/logos/primary-logo.png" class="max-h-75px" alt="" />
										</a>
										<!--end::Logo-->
										<!--begin: Wizard Nav-->
										<div class="wizard-nav d-flex d-flex justify-content-center pt-10 pt-lg-20 pb-5">
											<!--begin::Wizard Steps-->
											<div class="wizard-steps">
												<!--begin::Wizard Step 1 Nav-->
												
												<!--end::Wizard Step 1 Nav-->
												<!--begin::Wizard Step 2 Nav-->
												<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
													<div class="wizard-wrapper">
														<div class="wizard-icon">
															<i class="wizard-check ki ki-check"></i>
															<span class="wizard-number">1</span>
														</div>
														<div class="wizard-label">
															<h3 class="wizard-title">Personal Details</h3>
															<div class="wizard-desc">Add Your Personal Details</div>
														</div>
													</div>
												</div>
												<!--end::Wizard Step 2 Nav-->
												<!--begin::Wizard Step 2 Nav-->
												<div class="wizard-step" data-wizard-type="step">
													<div class="wizard-wrapper">
														<div class="wizard-icon">
															<i class="wizard-check ki ki-check"></i>
															<span class="wizard-number">2</span>
														</div>
														<div class="wizard-label">
															<h3 class="wizard-title">Organization Details</h3>
															<div class="wizard-desc">Add Your Organization</div>
														</div>
													</div>
												</div>
												<!--end::Wizard Step 2 Nav-->
												
												<!--begin::Wizard Step 3 Nav-->
												<div class="wizard-step" data-wizard-type="step">
													<div class="wizard-wrapper">
														<div class="wizard-icon">
															<i class="wizard-check ki ki-check"></i>
															<span class="wizard-number">3</span>
														</div>
														<div class="wizard-label">
															<h3 class="wizard-title">Completed!</h3>
															<div class="wizard-desc">Tell us about yourself</div>
														</div>
													</div>
												</div>
												<!--end::Wizard Step 3 Nav-->
											</div>
											<!--end::Wizard Steps-->
										</div>
										<!--end: Wizard Nav-->
									</div>
									<!--end::Aside Top-->
									<!--begin::Aside Bottom-->
									<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-y-top bgi-position-x-center bgi-size-contain h-350px" style="background-image: url(/assets/media/svg/illustrations/features.svg)"></div>
									<!--end::Aside Bottom-->
								</div>
								<!--begin::Aside-->
								<!--begin::Content-->
								<div class="wizard-content bg-gray-100 d-flex flex-column flex-row-fluid py-15 px-5 px-lg-10">
									<!--begin::Title-->
									<div class="text-right mb-lg-10 mb-15 mr-xxl-10" style="visibility: hidden;">
										<span class="font-weight-bold text-muted font-size-h5">Having issues?</span>
										<a href="javascript:;" class="font-weight-bolder text-primary font-size-h4" id="kt_login_signup">Get Help</a>
									</div>
									@if ($errors->any())
									    <div class="alert alert-danger">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
									@isset ($status)
									    <div class="alert alert-success">
									    	{{$status}}
									    </div>
									@endisset
									
									<!--end::Title-->
									<!--begin::Form-->
									<div class="d-flex justify-content-center flex-row-fluid">
										<form class="pb-5 w-100 w-md-450px w-lg-500px" method="post" novalidate="novalidate" id="kt_form">
											@csrf
											
											<!--begin: Wizard Step 1-->
											<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
												<!--begin::Title-->
												<div class="pb-10 pb-lg-15">
													<h3 class="font-weight-bolder text-dark font-size-h2">Personal Details</h3>
												</div>
												<!--begin::Title-->
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">First Name</label>
													<input maxlength="255" type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="firstname" placeholder="First Name" value="" />
												</div>
												<!--end::Form Group-->
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Last Name</label>
													<input maxlength="255" type="text" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="lastname" placeholder="Last Name" value="" />
												</div>
												<!--end::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
													<input maxlength="255" type="email" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="email" placeholder="Email" value="" />
												</div>
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Password</label>
													<input maxlength="255" type="password" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="password"  />
												</div>
												<!--begin::Form Group-->
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Re Enter Password</label>
													<input maxlength="255" type="password" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="password_repeat" value="" />
												</div>
												<!--begin::Form Group-->
											</div>
											<!--end: Wizard Step 1-->
											<!--begin: Wizard Step 2-->
											<div class="pb-5" data-wizard-type="step-content">
												<!--begin::Title-->
												<div class="pb-10 pb-lg-15">
													<h3 class="font-weight-bolder text-dark font-size-h2">Organization Details</h3>
													
												</div>
												<!--end::Title-->
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Organization Name</label>
													<input maxlength="255" type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="org_name"  value="" />
												</div>
												<!--begin::Form Group-->
												<!--end::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Organization Type</label>
													<select name="org_type_no" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
														<option value="">Select</option>
														@foreach ($org_types as $org_type)
															<option value="{{$org_type->org_type_id}}">{{$org_type->org_type_name}}</option>
														@endforeach
														
													</select>
												</div>
												<!--end::Form Group-->
												<!--end::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Organization Size</label>
													<select name="org_size" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
														<option value="">Select</option>
														<option value="1-50">1 - 50</option>
														<option value="51-100">51 - 100</option>
														<option value="101-500">101 - 500</option>
														<option value="501-1000">501 - 1,000</option>
														<option value="1001-5000">1,001 - 5,000</option>
														<option value="5000+">5,000+</option>
														
														
													</select>
												</div>
												<!--end::Form Group-->
												<!--begin::Form Group-->
												{{-- <div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Address</label>
													<input maxlength="255" type="text" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="org_address" placeholder="Address Line 1" value="" />
												</div> --}}
												<!--begin::Form Group-->
												<!--end::Row-->
												{{-- <div class="row">
													<div class="col-lg-6 col-md-6">
														<!--end::Form Group-->
														<div class="form-group">
															<label class="font-size-h6 font-weight-bolder text-dark">Country</label>
															<select name="country" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
																<option value="">Select</option>
																@foreach ($countries as $country)
																	<option value="{{$country->id}}" {{ ($country->iso2 == "NG") ? "selected": "" }}>{{$country->name}}</option>
																@endforeach
																
															</select>
														</div>
														<!--end::Form Group-->
													</div>
													<div class="col-lg-6 col-md-6">
														<!--end::Form Group-->
														
														<div class="form-group">
															<label class="font-size-h6 font-weight-bolder text-dark">State</label>
															<select name="state_no" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
																<option value="">Select</option>
																
															</select>
														</div>
														<!--begin::Form Group-->
													</div>
													
												</div> --}}
												<!--begin::Row-->
											</div>
											<!--end: Wizard Step 2-->
											<!--begin: Wizard Step 2-->
											<div class="pb-5" data-wizard-type="step-content">
												<!--begin::Title-->
												<div class="pb-10 pb-lg-15">
													<h3 class="font-weight-bolder text-dark font-size-h2">More Details</h3>
													
												</div>
												<!--end::Title-->
												<!--end::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">What is your highest priority with Gopius?</label>
													<select required name="org_priority" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
														<option value="">Select</option>
														<option value="Training Employees">Training Employees</option>
														<option value="Training Customers">Training Customers</option>
														<option value="Teaching Students">Teaching Students</option>
														<option value="Training Partners">Training Partners</option>
														<option value="others">others</option>
														
														
														
													</select>
												</div>
												<!--end::Form Group-->
												<!--end::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Why do you want to use Gopius?</label>
													<select required name="org_why" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
														<option value="">Select</option>
														<option value="I want to start using a LMS">I want to start using a LMS</option>
														<option value="I want to change my LMS">I want to change my LMS</option>
														<option value="I want to transfer my courses online">I want to transfer my courses online</option>
														<option value="Inquiring for client">Inquiring for client</option>
														<option value="I want to partner with GoPius">I want to partner with GoPius</option>
														<option value="others">Others</option>
														
														
													</select>
												</div>
												<!--end::Form Group-->
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Tell us about your Organization</label>
													<textarea class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="about_org" placeholder="About Organization" ></textarea>
												</div>
												<!--begin::Form Group-->
												<div class="form-group">
													<label class="font-size-h6 font-weight-bolder text-dark">Number</label>
													<input maxlength="255" type="phone" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="phone" placeholder="Number" value="" />
												</div>
												
											</div>
											<!--end: Wizard Step 2-->
											
											<!--begin: Wizard Actions-->
											<div class="d-flex justify-content-between pt-3">
												<div class="mr-2">
													<button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
													<span class="svg-icon svg-icon-md mr-1">
														<!--begin::Svg Icon | path:/assets/media/svg/icons/Navigation/Left-2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
																<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>Previous</button>
												</div>
												<div>
													<button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" data-wizard-type="action-submit">Submit
													<span class="svg-icon svg-icon-md ml-2">
														<!--begin::Svg Icon | path:/assets/media/svg/icons/Navigation/Right-2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span></button>
													<button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">Next Step
													<span class="svg-icon svg-icon-md ml-1">
														<!--begin::Svg Icon | path:/assets/media/svg/icons/Navigation/Right-2.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24" />
																<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
																<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span></button>
												</div>
											</div>
											<!--end: Wizard Actions-->
										</form>
									</div>
									<!--end::Form-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wizard 5-->
						</div>
						<!--end::Card Body-->
					</div>
					<!--end::Card-->
				
				<!--end::Container-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="/assets/js/pages/custom/wizard/wizard-5.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
<script type="text/javascript">
	var selectEl = document.querySelector("select[name=country]");
	var selectStateEl = document.querySelector("select[name=state_no]");
	var fetchState = async (country_id)=>{
		var response = await fetch(`/state-json/${country_id}`)
		.then((resp)=>resp.json())
		.then((json)=>{
			console.log(json.length);
			// json.forEach((e)=>{console.log(e)})
			selectStateEl.innerHTML = "";
			var createEl = document.createElement('option');
			createEl.innerHTML = 'Select State';
			createEl.value = '';
			selectStateEl.add(createEl);
			for(var state of json){
				var createEl = document.createElement('option');
				createEl.innerHTML = state.name;
				createEl.value = state.id;
				selectStateEl.add(createEl);
			}
			
		});
	}
	var renderState = (e)=>{
		var target = e.target;
		console.log(target.value);
		selectStateEl.innerHTML = "";
		var createEl = document.createElement('option');
		createEl.innerHTML = 'loading ...';
		selectStateEl.add(createEl);
		fetchState(target.value);

	}
	selectEl.addEventListener('change', renderState );
	// fetchState(161);
</script>