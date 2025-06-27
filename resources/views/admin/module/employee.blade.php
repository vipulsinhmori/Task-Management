@extends('moduals_layout.main')
@section('title')
    Employee
@endsection

@section('content')
<nav class="navbar bg-body p-0">
        <div class="container-fluid p-0">
            <a class="navbar-brand"><h5 class="fw-bold">Employee </h5></a>
            <div class="d-flex justify-contant-center me-auto ms-auto">
                    <form class=""  role="search" style="width:600px;">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    </form>
            </div>
        </div>
    </nav>
    @php
        use App\Models\User;
    @endphp
    <div class="row  rounded overflow-hidden">
        <div class="col-xxl-2 bg-light border-end py-4">
            <h6 class="fs-5 pb-3 w-100 text-start fw-semibold">Department</h6>
            <ul class="nav nav-pills flex-column me-4 text-start" id="v-pills-tab" role="tablist">
                <li class="nav-item mb-2" role="presentation">
                    <button class="active text-start w-100 px-4" id="v-pills-all-tab" data-bs-toggle="tab"
                        data-bs-target="#v-pills-all" type="button" role="tab" aria-controls="v-pills-all"
                        aria-selected="true">All</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class=" text-start w-100 px-4" id="v-pills-accounts-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-accounts" type="button" role="tab" aria-controls="v-pills-accounts"
                        aria-selected="false">Accounts</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-admin-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-admin" type="button" role="tab" aria-controls="v-pills-admin"
                        aria-selected="false">Administration</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-content-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-content" type="button" role="tab" aria-controls="v-pills-content"
                        aria-selected="false">Content</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-creative-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-creative" type="button" role="tab" aria-controls="v-pills-creative"
                        aria-selected="false">Creative Head</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-graphic-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-graphic" type="button" role="tab" aria-controls="v-pills-graphic"
                        aria-selected="false">Graphic</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-hr-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-hr" type="button" role="tab" aria-controls="v-pills-hr"
                        aria-selected="false">HR</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-management-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-management" type="button" role="tab"
                        aria-controls="v-pills-management" aria-selected="false">Management</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-ppc-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-ppc" type="button" role="tab" aria-controls="v-pills-ppc"
                        aria-selected="false">PPC</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-smo-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-smo" type="button" role="tab" aria-controls="v-pills-smo"
                        aria-selected="false">SMO</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-sco-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-seo" type="button" role="tab" aria-controls="v-pills-seo"
                        aria-selected="false">SEO</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-sales-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-sales" type="button" role="tab" aria-controls="v-pills-sales"
                        aria-selected="false">Sales</button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="text-start w-100 px-4" id="v-pills-web-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-web" type="button" role="tab" aria-controls="v-pills-web"
                        aria-selected="false">Web Development</button>
                </li>
            </ul>
        </div>
        <div class="col-xxl-10 py-4" style="height:100vh;">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel"
                    aria-labelledby="v-pills-all-tab">
                    <div class="row g-4">
                        @php $usersall = User::all(); @endphp
                        @foreach ($usersall as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-accounts" role="tabpanel" aria-labelledby="v-pills-accounts-tab">
                    <div class="row g-4">
                        @php $accounts = User::where('department', 'accounts')->get(); @endphp
                        @foreach ($accounts as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab">
                    <div class="row g-4">
                        @php $admin = User::where('department', 'admin')->get(); @endphp
                        @foreach ($admin as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-web" role="tabpanel" aria-labelledby="v-pills-web-tab">
                    <div class="row g-4">
                        @php $devlopmen = User::where('department', 'web-devlopment')->get(); @endphp
                        @foreach ($devlopmen as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-graphic" role="tabpanel" aria-labelledby="v-pills-graphic-tab">
                    <div class="row g-4">
                        @php $graphic = User::where('department', 'graphic')->get(); @endphp
                        @foreach ($graphic as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
                    <div class="row g-4">
                        @php $saleses = User::where('department', 'sales')->get(); @endphp
                        @foreach ($saleses as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
                 <div class="tab-pane fade" id="v-pills-seo" role="tabpanel" aria-labelledby="v-pills-seo-tab">
                    <div class="row g-4">
                        @php $seo = User::where('department', 'seo')->get(); @endphp
                        @foreach ($seo as $user)
                            @include('admin.module.emp-card', ['user' => $user])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
