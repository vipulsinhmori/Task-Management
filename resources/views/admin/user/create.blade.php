
@extends('layouts.main')
@section('title')
    Create User
@endsection
@section('content')
  <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                     <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
           <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 ">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-name">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="basic-default-name"
                                    placeholder="Enter Full Name..." value="{{ old('name') }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-email">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" id="basic-default-email" class="form-control"
                                    placeholder="example@example.com" aria-label="example@example.com"
                                    aria-describedby="basic-default-email2" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-image">Address <span
                                        class="text-danger">*</span></label>
                                <input type="text"  class="form-control" name="address"
                                    value="{{ old('address') }}"   placeholder="Enter Your Address">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-image">Phone Number <span
                                        class="text-danger">*</span></label>
                                <input type="text"  class="form-control" name="number"
                                    value="{{ old('number') }}"  placeholder="Enter Your Phone Number">
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                               <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-password">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" id="basic-default-password" class="form-control"
                                    placeholder="........"
                                    name="password" value="{{ old('password') }}" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-default-image">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" id="basic-default-image" class="form-control" name="image"
                                    value="{{ old('image') }}" accept="image/*" onchange="previewImage(event)" />
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="col-md-4 mt-1" id="image-preview-container" style="display:none;">
                                <label class="form-label"></label>
                                <img class="img-circle img-thumbnail shadow" id="image-preview" src="#" alt="Image Preview"
                                    width="70" height="70" />
                            </div>
                        </div>
                         <div class="row">
                           <div class="col-md-4 mb-3">
                            <label class="form-label" for="basic-default-image">
                                Select Role <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" aria-label="Default select example" name="role_id">
                                <option selected disabled>-- Select Role --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                              <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input class="form-control" type="text"  name="state" placeholder="Gujarat" />
                        </div>
                        <div class="col-md-4">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" name="zipcode" placeholder="231465"
                                maxlength="6" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="country">Country</label>
                            <select id="country" class="select2 form-select" name="country">
                                
                                <option value="">Select</option>
                                <option value="India">India</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="language" class="form-label">Language</label>
                            <select id="language" class="select2 form-select" name="language">
                                <option value="">Select Language</option>
                                <option value="en">English</option>
                                <option value="hi">Hindi</option>
                                <option value="gu">Gujarati</option>
                               
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-primary me-3">Save</button>
                                <button type="reset" class="btn btn-sm btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
