@extends('dashboard.adminLayout.main')
@push('title')
    <title>users</title>
@endpush
@section('main-layout')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- user profile -->
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="row">
                                @if ($userProfile->image == null)
                                    <img src="{{ asset('dashboard/dist/img/profile.png') }}" alt="User Image"
                                        class="img-fluid rounded-circle">
                                @else
                                    <div class="">
                                        <img src="{{ asset('images/' . $userProfile->image) }}" alt="User Image"
                                            class="img-fluid rounded-circle" width="148px" height="148px">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="mt-3">
                                    @if ($userProfile->isKycVerified == 1)
                                        <i class="bi bi-patch-check-fill"></i>
                                    @endif
                                    @if ($userProfile->isDonor == 1)
                                        <span class="badge bg-info">Donor</span>
                                    @endif
                                    @if ($userProfile->isVolunteer == 1)
                                        <span class="badge bg-success">Volunteer</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            {{-- <h2>User Profile</h2> --}}
                            <hr>

                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <p id="name">{{ $userProfile->name }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <p id="email">{{ $userProfile->email }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="gender" class="form-label">Gender:</label>
                                    <p id="gender">{{ $userProfile->gender }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <p id="phone">{{ $userProfile->phone }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="dob" class="form-label">Date Of Birth:</label>
                                    <p id="dob">{{ $userProfile->dob }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="age" class="form-label">Age:</label>
                                    <p id="age">{{ ageCalculator($userProfile->dob) }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="blood-group" class="form-label">Blood Group:</label>
                                    <p id="blood-group">{{ $userProfile->blood_group }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="district" class="form-label">District:</label>
                                    <p id="district">{{ $userProfile->district }}</p>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="city" class="form-label">City:</label>
                                    <p id="City">{{ $userProfile->city }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="card bg-light">
                                        <h5 class="card-header">Requested To</h5>
                                        <div class="card-body">
                                            @foreach ($userProfile->requestedBlood as $bloodRequested)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><b>Donor
                                                                Name:</b>{{ $bloodRequested->donor->name }}</h5>
                                                        <h5 class="card-title"><b class="fw-bold">Hospital
                                                                Name:</b>{{ $bloodRequested->hospital_name }}</h5>
                                                        <h5 class="card-title"><b class="fw-bold">Donation Date:</b>{{ $bloodRequested->donated_at }} </h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="card bg-light">
                                        <h5 class="card-header">Donated Blood</h5>
                                        <div class="card-body">
                                            @foreach ($userProfile->donatedBlood as $bloodDonated)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><b>Requestor
                                                                Name:</b>{{ $bloodDonated->requestor->name }}</h5>
                                                        <h5 class="card-title"><b class="fw-bold">Hospital
                                                                Name:</b>{{ $bloodDonated->hospital_name }}</h5>
                                                        <h5 class="card-title"><b class="fw-bold">Donated
                                                                Date:</b>{{ $bloodDonated->donated_at }} </h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
