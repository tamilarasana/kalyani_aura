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
                        <h2 class="h5 page-title">Manage Location</h2>
                    </div>
                    <div class="col-auto">
                        {{-- <a  href="{{ route('managelocations.create') }}" class="btn mb-2 btn-outline-secondary addbutton" 
                             data-whatever="@mdo">+</a> --}}
							<div class="pull-right" data-target="#varyModal" data-toggle="modal">
								<a   href="{{ route('managelocations.create') }}" class="btn btn-success" > Add Location </a>
							</div>                       
                    </div>
                </div>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                      <div class="card shadow">
                        <div class="card-body">
                          <!-- table -->
                          <table class="table datatables" id="dataTable-1">
                            <thead>
                              <tr>
                                <th>Location Name</th>
                                <th>Contact Number</th>
                                <th>Area</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($location) > 0) --}}
                                    @foreach ($location as $location)
                                        <tr>
                                            <td> <a href="{{route('managelocations.show', $location->id)}}">{{ $location->location_name }}</a></td>
                                            <td> {{ $location->contact_number }} </td>
                                            <td>{{  $location->area }}</td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                <a href="{{route('managelocations.edit', $location->id)}}" class="dropdown-item" >Edit</a>
                                                <a  href="{{ route('managelocations.destroy', ['id' => $location->id]) }}"  class="dropdown-item" >Remove</a> 
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- @else
                                    <strong>There is no Data.</strong>
                                @endif --}}
        
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> <!-- simple table -->
                  </div> <!-- end section -->
             
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection

@section('scripts')
@endsection
