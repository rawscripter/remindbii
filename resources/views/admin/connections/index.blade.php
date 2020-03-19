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
							<select name="" id="" data-user="{{$user->id}}" class="form-control select-relation select2">
								<option value="">Select Connection Type</option>
								@foreach($relations as $relation)
									<option value="{{$relation->id}}">{{$relation->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection

@section('footer')
	<script !src="">
      $(document).ready(function () {
          $('.select-relation').on('change', function () {
              let select = $(this);
              let relation = this.value;
              let user = $(this).data('user');
              select.prop('disabled', true);
              $.get(`/connection/${user}/${relation}/add`, function (data) {
                  if (data === 'success') {
                      showToastPosition('top-right', 'success', 'Successfully Connection Added.');
                      select.prop('disabled', true);
                  } else {
                      showToastPosition('top-right', 'error', 'Failed! Please try after sometime.');
                      select.prop('disabled', false);
                  }
              });
          });
      });
	</script>
@endsection