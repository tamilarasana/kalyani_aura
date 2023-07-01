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
                        <h2 class="h5 page-title">Manage Company</h2>
                    </div>
                    <div class="col-auto">
							<div class="pull-right" data-target="#varyModal" data-toggle="modal">
								<a   href="{{ route('managecompany.create') }}" class="btn btn-success" href="#"> New Company</a>
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
                                <th>Company Name</th>
                                <th>Web Url</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                {{-- @if (count($company) > 0) --}}
                                    @foreach ($company as $company)
                                        <tr>
                                            <td><a href="{{route('managecompany.show', $company->id)}}">{{ $company->company_name }}</a></td>
                                           <td>{{ $company->web_url }}</td>
                                            <td>{{  $company->company_email }}</td>
                                            <td>{{  $company->contact_number }}</td>
                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right align-items-center mb-2">
                                                <a href="{{route('managecompany.edit', $company->id)}}" class="dropdown-item">Edit</a>
                                                <a  href="{{ route('managecompany.destroy', ['id' => $company->id]) }}"  class="dropdown-item" >Remove</a> 
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
