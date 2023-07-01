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
                        <h2 class="h5 page-title">Manage Member</h2>
                    </div>
                    <div class="col-auto">
							<div class="pull-right" data-target="#varyModal" data-toggle="modal">
								<a   href="{{ route('managemember.create') }}" class="btn btn-success" href="#"> New Member</a>
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
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($member) > 0) --}}
                                    @foreach ($member as $member)
                                        <tr>
                                            <td>
                                                <div class="avatar avatar-sm">
                                                    {{-- <img src="{{ asset('storage/'.$member->profile_image) }}" alt="..." class="avatar-img rounded-circle"> --}}
                                                <img src="./assets/avatars/face-3.jpg" alt="..." class=" rounded-circle" style="width: 50px">
                                                </div>
                                            </td>
                                            <td><a href="{{route('managemember.show', $member->id)}}">{{ $member->name }}</a></td>
                                            <td>{{  $member->email }}</td>
                                            <td>{{  $member->mobile }}</td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                <a href="{{route('managemember.edit', $member->id)}}" class="dropdown-item" >Edit</a>
                                                <a  href="{{ route('managemember.destroy', ['id' => $member->id]) }}"  class="dropdown-item" >Remove</a> 
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
