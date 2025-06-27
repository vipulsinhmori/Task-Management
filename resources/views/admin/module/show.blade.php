@extends('moduals_layout.main')
@section('title')
    Employee Profile
@endsection
@section('content')
    <div class="row">
        <div class="shadow-lg bg-white rounded-4 p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <p class="text-muted mb-1">Employee Name</p>
                    <h2 class="fw-bold text-dark">{{ $user->name }}</h2>
                    <div class="mt-3 text-dark">
                        <p class="mb-0"><strong>Name:</strong> {{ $user->name }}</p>
                    </div>
                </div>
                <div class="text-end">
                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px;">
                        <span class="text-white fw-bold fs-2">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 col-lg-4 mb-3">
                    <p><strong>Work Mobile:</strong> {{ $user->number }}</p>
                    <p><strong>Work Phone:</strong> {{ $user->number }}</p>
                    <p><strong>Work Email:</strong>
                        <a href="mailto:{{ $user->email }}" class="text-decoration-none text-primary">
                            {{ $user->email }}
                        </a>
                    </p>
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <p><strong>Coach:</strong> {{ $user->coach ?? '-' }}</p>
                    <p><strong>Time Off:</strong> {{ $user->time_off ?? '-' }}</p>
                    <p><strong>Department:</strong> {{ $user->department }}</p>
                    <p><strong>Designation:</strong> {{ $user->designation }}</p>
                    <p><strong>Manager:</strong> {{ $user->manager ?? '-' }}</p>
                </div>
            </div>
            <ul class="nav nav-tabs border-bottom mb-3" id="profileTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="resume-tab" data-bs-toggle="tab" data-bs-target="#resume"
                        type="button" role="tab">Resume</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="workinfo-tab" data-bs-toggle="tab" data-bs-target="#workinfo"
                        type="button" role="tab">Work Information</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="badges-tab" data-bs-toggle="tab" data-bs-target="#badges" type="button"
                        role="tab">Received Badges</button>
                </li>
            </ul>
            <div class="tab-content text-dark" id="profileTabContent">
                <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                    <p><strong>Experience:</strong></p>
                    <ul class="mb-0">
                        <li>
                            {{ $user->experience_start ?? '12/17/2024' }} - <strong>Current</strong>:
                            {{ $user->company ?? 'AONE SEO SERVICE PVT. LTD' }}
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="workinfo" role="tabpanel" aria-labelledby="workinfo-tab">
                    <p><strong>Work Address:</strong></p>
                    <ul class="mb-0">
                        <li>
                            {{ $user->experience_start ?? '12/17/2024' }} - <strong>Current</strong>:
                            {{ $user->company ?? 'AONE SEO SERVICE PVT. LTD' }}
                            <div class="mt-2">
                                <p class="mb-1">{{ $user->address }} {{ $user->zipcode }}</p>
                                <p class="mb-0">{{ $user->country }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="badges" role="tabpanel" aria-labelledby="badges-tab">
                    <p>No badges received.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
