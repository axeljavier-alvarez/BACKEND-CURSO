@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row my-5">
        <div class="col-md-4">
            <!-- sidebar here -->
            @include('admin.layouts.sidebar')
        </div>
        <div class="col-md-8">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-brands fa-product-hunt"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Products</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- products count here -->
                                            {{ $products->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-regular fa-face-smile-beam"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Positives</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- positives count here -->
                                            {{ $positives->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-regular fa-face-frown"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Negatives</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- negatives count here -->
                                            {{ $negatives->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-yellow-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Histories</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- histories count here -->
                                            {{ $histories->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-red-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Users</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- users count here -->
                                            {{ $users->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-moonlight-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-chart-gantt"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Plans</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- plans count here -->
                                            {{ $plans->count() }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card dashboard_card l-bg-pink-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                </div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">Subscriptions</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            <!-- subscriptions count here -->
                                            {{ $subscriptions->count() }}
                                        </h2>
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
