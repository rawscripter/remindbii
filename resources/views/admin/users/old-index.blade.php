<?php $page = 'available-users'; ?>
@extends('layouts.admin.layout')
@section('content')
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				Users table
			</h3>
			
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">All Users</li>
				</ol>
			</nav>
		</div>
		
		
		@if(Session::has('message'))
			<div class="row">
				<div class="col-md-12 m-auto">
					<p class="alert alert-success">{{ Session::get('message') }}</p>
				</div>
			</div>
		@endif
		
		
		<div class="row">
			@foreach($users as $user)
				<div class="col-md-3 mb-2">
					<div class="card">
						<div class="card-body">
							<div class="border-bottom text-center pb-4">
								<img src="{{asset('assets/admin/images/avatar-default.png')}}" alt="profile"
								     class="img-lg rounded-circle mb-3">
								<p class="text-center h5">{{$user->name}}</p>
							</div>
							{{--							<div class="border-bottom py-4">--}}
							{{--								<p>Relation</p>--}}
							{{--								<div>--}}
							{{--									<label class="badge badge-outline-dark">Chalk</label>--}}
							{{--								</div>--}}
							{{--							</div>--}}
							
							<div class="py-4">
								<p class="clearfix">
                          <span class="float-left">
                            Status
                          </span>
									<span class="float-right text-muted">
                            Active
                          </span>
								</p>
								<p class="clearfix">
                          <span class="float-left">
                            Date Of Birth
                          </span>
									<span class="float-right text-muted">
                            {{\Carbon\Carbon::parse($user->birth_date)->format('d M Y')}}
                          </span>
								</p>
								<p class="clearfix">
                          <span class="float-left">
                            Mail
                          </span>
									<span class="float-right text-muted">
                            {{$user->email}}
                          </span>
								</p>
							
							</div>
							<form action="{{route('add.new.connection',[$user->id,auth()->user()->id])}}">
								@csrf
								<select name="" id="" class="form-control select2">
									<option value="">Select Connection Type</option>
									@foreach($relations as $relation)
										<option value="">{{$relation->name}}</option>
									@endforeach
								</select>
							</form>
						</div>
						{{--					<div class="col-12 mt-5">--}}
						{{--						<div id="order-listing_wrapper"--}}
						{{--						     class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">--}}
						{{--							<table class="table  no-footer" role="grid"--}}
						{{--							       aria-describedby="order-listing_info">--}}
						{{--								<thead>--}}
						{{--								<tr role="row">--}}
						{{--									<th>Sl.</th>--}}
						{{--									<th>Name</th>--}}
						{{--									<th>Email</th>--}}
						{{--									<th>Date Of Birth</th>--}}
						{{--									<th>Added At</th>--}}
						{{--									<th>Add To Connection</th>--}}
						{{--								</tr>--}}
						{{--								</thead>--}}
						{{--								<tbody>--}}
						{{--								@if($users->count() > 0)--}}
						{{--									@foreach($users as $user)--}}
						{{--										<tr>--}}
						{{--											<td>{{$user->id}}</td>--}}
						{{--											<td>{{$user->name}}</td>--}}
						{{--											<td>{{$user->email}}</td>--}}
						{{--											<td>{{\Carbon\Carbon::parse($user->birth_date)->format('d M Y')}}</td>--}}
						{{--											<td>{{ $user->created_at->format('m-d-Y H:s:i') }}</td>--}}
						{{--											--}}{{--											<td><a href="#"--}}
						{{--											--}}{{--											       class="btn btn-primary">Login </a></td>--}}
						{{--											<td>--}}
						{{--												--}}
						{{--												<a href="#" class="btn btn-primary btn-sm"> Add To List</a>--}}
						{{--												--}}{{--												<form method="POST"--}}
						{{--												--}}{{--												      action="#">--}}
						{{--												--}}{{--													{{ csrf_field() }}--}}
						{{--												--}}{{--													{{ method_field('DELETE') }}--}}
						{{--												--}}{{--													<input--}}
						{{--												--}}{{--															onClick="return confirm('Are you sure you want to delete the User?')"--}}
						{{--												--}}{{--															type="submit" class="btn rounded-0 btn-danger"--}}
						{{--												--}}{{--															value="Delete">--}}
						{{--												--}}{{--												</form>--}}
						{{--											</td>--}}
						{{--										</tr>--}}
						{{--									@endforeach--}}
						{{--								@endif--}}
						{{--								</tbody>--}}
						{{--							</table>--}}
						{{--						</div>--}}
						{{--					</div>--}}
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection