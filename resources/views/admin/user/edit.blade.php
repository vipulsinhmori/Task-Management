@extends('layouts.main')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">edit</li>
                </ol>
            </nav>
            <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="card mb-4">
        <form action="{{ route('user.update', ['encodedId' => Crypt::encrypt($user->id)]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4 pb-4 border-bottom">
                    <div class="d-block w-px-100 h-px-100">
                        {!! $user->getImage(100, 100) !!}
                    </div>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="image" hidden>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </label>
                        <div>Allowed JPG, GIF or PNG. Max size of 400K</div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">Name</label>
                        <input class="form-control" type="text" id="firstName" name="name"
                            value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">IN (+91)</span>

                            <input class="form-control" type="text" name="number" placeholder="202 555 0111"
                                value="{{ old('number', $user->number) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input class="form-control" type="text" name="address"
                            value="{{ old('address', $user->address) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="state" class="form-label">State</label>
                        <input class="form-control" type="text" id="state" name="state"
                            value="{{ old('state', $user->state) }} ">
                    </div>
                    <div class="col-md-6">
                        <label for="zipCode" class="form-label">Zip Code</label>
                        <input type="text" class="form-control" id="" name="zipcode" placeholder="231465"
                            maxlength="6" value="{{ old('zipcode', $user->zipcode) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select" name="country">
                            <option value="Australia"
                                {{ old('country', $user->country) == 'Australia' ? 'selected' : '' }}>
                                Australia</option>
                            <option value="France" {{ old('country', $user->country) == 'France' ? 'selected' : '' }}>
                                France</option>
                            <option value="Germany" {{ old('country', $user->country) == 'Germany' ? 'selected' : '' }}>
                                Germany</option>
                            <option value="India" {{ old('country', $user->country) == 'India' ? 'selected' : '' }}>India
                            </option>
                            <option value="United States"
                                {{ old('country', $user->country) == 'United States' ? 'selected' : '' }}>United States
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="language" class="form-label">Language</label>
                        <select id="language" class="select2 form-select" name="language">
                            <option value="English" {{ old('language', $user->language) == 'English' ? 'selected' : '' }}>
                                English</option>
                            <option value="Hindi" {{ old('language', $user->language) == 'Hindi' ? 'selected' : '' }}>
                                Hindi</option>
                            <option value="Gujarati"
                                {{ old('language', $user->language) == 'Gujarati' ? 'selected' : '' }}>
                                Gujarati</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="designation" class="form-label">Designation</label>
                        <input class="form-control" type="text" name="designation"
                            value="{{ old('designation', $user->designation) }}">
                        @error('designation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="department">Department</label>
                        <select id="department" class="select2 form-select" name="department">
                            <option value="">Select</option>
                            <option value="web-devlopment">web-devlopment</option>
                            <option value="seo">Search Engine Optimizetion</option>
                            <option value="digital-marketing">Digital Marketing</option>
                            <option value="smo">Social Media Optimizetion</option>
                            <option value="aso">App Store Optimizetion</option>
                            <option value="ui/ux">Ui/Ux Designer</option>
                             <option value="graphic">Graphic</option>
                            <option value="sales">Sales</option>
                            <option value="content-marketing">Content Marketing</option>
                            <option value="e-commarce-seo">E-Commarce-Seo</option>
                            <option value="branding">Branding</option>
                        </select>
                        @error('department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
