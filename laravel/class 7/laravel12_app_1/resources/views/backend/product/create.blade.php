@extends('backend.master')
@section('content')
<main class="page-content">
        <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Forms</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->


         <div class="row">

            <div class="col-lg-6">
               <div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">Vertical Form</h5>
								<form class="row g-3">
									<div class="col-md-6">
										<label for="input1" class="form-label">First Name</label>
										<input type="text" class="form-control" id="input1" placeholder="First Name">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Last Name</label>
										<input type="text" class="form-control" id="input2" placeholder="Last Name">
									</div>
									<div class="col-md-12">
										<label for="input3" class="form-label">Phone</label>
										<input type="text" class="form-control" id="input3" placeholder="Phone">
									</div>
									<div class="col-md-12">
										<label for="input4" class="form-label">Email</label>
										<input type="email" class="form-control" id="input4" placeholder="Email">
									</div>
									<div class="col-md-12">
										<label for="input5" class="form-label">Password</label>
										<input type="password" class="form-control" id="input5" placeholder="Password">
									</div>
									<div class="col-md-12">
										<label for="input6" class="form-label">DOB</label>
										<input type="date" class="form-control" id="input6">
									</div>
									<div class="col-md-12">
										<label for="input7" class="form-label">Country</label>
										<select id="input7" class="form-select">
											<option selected="">Choose...</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
										</select>
									</div>
									
									<div class="col-md-6">
										<label for="input8" class="form-label">City</label>
										<input type="text" class="form-control" id="input8">
									</div>
									<div class="col-md-4">
										<label for="input9" class="form-label">State</label>
										<select id="input9" class="form-select">
											<option selected="">Choose...</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
										</select>
									</div>
									<div class="col-md-2">
										<label for="input10" class="form-label">Zip</label>
										<input type="text" class="form-control" id="input10" placeholder="Zip">
									</div>
									<div class="col-md-12">
										<label for="input11" class="form-label">Address</label>
										<textarea class="form-control" id="input11" placeholder="Address ..." rows="3"></textarea>
									</div>
									<div class="col-md-12">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="input12">
											<label class="form-check-label" for="input12">Check me out</label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
											<button type="button" class="btn btn-primary px-4">Submit</button>
											<button type="button" class="btn btn-light px-4">Reset</button>
										</div>
									</div>
								</form>
							</div>
						</div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body p-4">
                  <h5 class="mb-4">Vertical Icon</h5>
                  <form class="row g-3">
                    <div class="col-md-6">
                      <label for="input13" class="form-label">First Name</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input13" placeholder="First Name">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-person"></i></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="input14" class="form-label">Last Name</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input14" placeholder="Last Name">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-telephone"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input15" class="form-label">Phone</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input15" placeholder="Phone">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-telephone"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input16" class="form-label">Email</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input16" placeholder="Email">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-chat-left-text"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input17" class="form-label">Password</label>
                      <div class="position-relative input-icon">
                        <input type="password" class="form-control" id="input17" placeholder="Password">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-key"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input18" class="form-label">DOB</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input18" placeholder="DOB">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-calendar-check"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input19" class="form-label">Country</label>
                      <select id="input19" class="form-select">
                        <option selected="">Choose...</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="input20" class="form-label">City</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input20" placeholder="City">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-building"></i></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="input21" class="form-label">State</label>
                      <select id="input21" class="form-select">
                        <option selected="">Choose...</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="input22" class="form-label">Zip</label>
                      <div class="position-relative input-icon">
                        <input type="text" class="form-control" id="input22" placeholder="Zip">
                        <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-geo-alt"></i></span>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input23" class="form-label">Address</label>
                      <textarea class="form-control" id="input23" placeholder="Address ..." rows="3"></textarea>
                    </div>
                    <div class="col-md-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="input24">
                        <label class="form-check-label" for="input24">Check me out</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="button" class="btn btn-primary px-4">Submit</button>
                        <button type="button" class="btn btn-light px-4">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="card">
                <div class="card-body p-4">
                  <h5 class="mb-4">Vertical Addon</h5>
                  <form class="row g-3">
                    <div class="col-md-12">
                      <label for="input25" class="form-label">First Name</label>
                       <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" id="input25" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input26" class="form-label">Last Name</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <input type="text" class="form-control" id="input26" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input27" class="form-label">Email</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="text" class="form-control" id="input27" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input28" class="form-label">Password</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control" id="input28" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input29" class="form-label">DOB</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-check-fill"></i></span>
                        <input type="text" class="form-control" id="input29" placeholder="DOB">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input30" class="form-label">Country</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-flag-fill"></i></span>
                        <select class="form-select" id="input30">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input31" class="form-label">Zip</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                        <input type="text" class="form-control" id="input31" placeholder="Zip">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input32" class="form-label">City</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-building-fill"></i></span>
                        <input type="text" class="form-control" id="input32" placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-12">
                      <label for="input33" class="form-label">State</label>
                      <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-flag-fill"></i></span>
                        <select class="form-select" id="input33">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="input34">
                        <label class="form-check-label" for="input34">Check me out</label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="button" class="btn btn-primary px-4">Submit</button>
                        <button type="button" class="btn btn-light px-4">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

        </div><!--end row-->


        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body p-4">
                <h5 class="mb-4">Horizontal Form</h5>
                <div class="row mb-3">
                  <label for="input35" class="col-sm-3 col-form-label">Enter Your Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="input35" placeholder="Enter Your Name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input36" class="col-sm-3 col-form-label">Phone No</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="input36" placeholder="Phone No">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input37" class="col-sm-3 col-form-label">Email Address</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="input37" placeholder="Email Address">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input38" class="col-sm-3 col-form-label">Choose Password</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="input38" placeholder="Choose Password">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input39" class="col-sm-3 col-form-label">Select Country</label>
                  <div class="col-sm-9">
                    <select class="form-select" id="input39">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input40" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="input40" rows="3" placeholder="Address"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="input41">
                      <label class="form-check-label" for="input41">Check me out</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                      <button type="button" class="btn btn-primary px-4">Submit</button>
                      <button type="button" class="btn btn-light px-4">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
            <div class="card">
              <div class="card-body p-4">
                <h5 class="mb-4">Horizontal Icon</h5>
                <div class="row mb-3">
                  <label for="input42" class="col-sm-3 col-form-label">Enter Your Name</label>
                  <div class="col-sm-9">
                    <div class="position-relative input-icon">
                      <input type="text" class="form-control" id="input42" placeholder="Enter Your Name">
                      <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-person-circle"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input43" class="col-sm-3 col-form-label">Phone No</label>
                  <div class="col-sm-9">
                    <div class="position-relative input-icon">
                      <input type="text" class="form-control" id="input43" placeholder="Phone No">
                      <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-telephone-fill"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input44" class="col-sm-3 col-form-label">Email Address</label>
                  <div class="col-sm-9">
                    <div class="position-relative input-icon">
                      <input type="text" class="form-control" id="input44" placeholder="Email Address">
                      <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-envelope-fill"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input45" class="col-sm-3 col-form-label">Choose Password</label>
                  <div class="col-sm-9">
                    <div class="position-relative input-icon">
                      <input type="text" class="form-control" id="input45" placeholder="Choose Password">
                      <span class="position-absolute top-50 translate-middle-y"><i class="bi bi-lock-fill"></i></span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input46" class="col-sm-3 col-form-label">Select Country</label>
                  <div class="col-sm-9">
                    <select class="form-select" id="input46">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input47" class="col-sm-3 col-form-label">Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="input47" rows="3" placeholder="Address"></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="input48">
                      <label class="form-check-label" for="input48">Check me out</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                      <button type="button" class="btn btn-primary px-4">Submit</button>
                      <button type="button" class="btn btn-light px-4">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
        
            <div class="card">
              <div class="card-body p-4">
                <h5 class="mb-4">Horizontal Addon</h5>
                <div class="row mb-3">
                  <label for="input49" class="col-sm-3 col-form-label">Enter Your Name</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                      <input type="text" class="form-control" id="input49" placeholder="Your Name">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input50" class="col-sm-3 col-form-label">Phone No</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-mic-fill"></i></span>
                      <input type="text" class="form-control" id="input50" placeholder="Phone No">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input51" class="col-sm-3 col-form-label">Email Address</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                      <input type="text" class="form-control" id="input51" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input52" class="col-sm-3 col-form-label">Choose Password</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                      <input type="text" class="form-control" id="input52" placeholder="Choose Password">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input53" class="col-sm-3 col-form-label">Select Country</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text"><i class="bi bi-flag-fill"></i></span>
                      <select class="form-select" id="input53">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="input54">
                      <label class="form-check-label" for="input54">Check me out</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                      <button type="button" class="btn btn-primary px-4">Submit</button>
                      <button type="button" class="btn btn-light px-4">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--end row-->


        <div class="card">
					<div class="card-body">
						<div class="row row-cols-1 g-3 row-cols-lg-auto align-items-center">
						   <div class="col">
							  <input type="text" class="form-control" placeholder="Name">
						   </div>
						   <div class="col">
							<input type="text" class="form-control" placeholder="Email">
						 </div>
						 <div class="col">
							<input type="text" class="form-control" placeholder="Phone">
						 </div>
						 <div class="col">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="input55">
								<label class="form-check-label" for="input55">Check me out</label>
							</div>
						 </div>
						 <div class="col">
							<button type="button" class="btn btn-primary px-4">Submit</button>
						 </div>
						</div><!--end row-->
					</div>
				</div>
        

     </main>
@endsection