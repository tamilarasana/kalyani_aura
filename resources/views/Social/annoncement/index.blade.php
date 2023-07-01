@extends('layouts.dashboard')
@section('title')
    Kalyani Aura
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Announcements</h2>
                    </div>
                    <div class="col-auto">
                        <div class="pull-right">
                            <a href="{{ route('announcement.create') }}" class="btn btn-success"> Add New </a>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
        <div class="row">
            {{-- <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3"> --}}
                            @if (count($announcement) > 0)
                                @foreach ($announcement as $announcement)
                                    <div class=" d-flex col-md-4 p-2">
                                        {{-- <div class="card mb-3  "> --}}
                                        <div class="announcement_single_body ">
                                            <a href="{{ route('announcement.edit', $announcement->id) }}"
                                                style="color:#6c757d">
                                                {{-- <div style="height: 200px;"> --}}
                                                <img class="aimg"src="{{ str_replace('public/', '', asset('storage/' . $announcement->image)) }}"
                                                    alt="...">
                                                </a>
                                                {{-- </div> --}}
                                                <div class="topdiv"><button
                                                        class="intrest">{{ $announcement->interested_count }}<i
                                                            class="fas fa-chart-pie pl-1 "></i></button>
                                                    <p class="title">{{ $announcement->title }}</p>
                                                </div>

                                                <div class="bottomdiv"> {{ $announcement->schedule_date }}
                                                    {{ $announcement->schedule_time }}<br>
                                                    {{ $announcement->message }}
                                                </div>
                                                {{-- <div class="bottomdiv">
												<p class="title"><span class="fe fe-18 fe-navigation">&nbsp;</span>{{ $announcement->locations->location_name }}</p>
											</div> --}}
                                            
                                        </div>

                                    </div>
                                @endforeach
                            @else
                                <strong>There is no Data.</strong>
                            @endif
                        {{-- </div>
                    </div>
                </div>
            </div> --}}
        </div> <!-- .container-fluid -->
    @endsection


    @section('scripts')
    @endsection
