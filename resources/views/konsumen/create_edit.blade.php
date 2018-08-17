@extends('layouts.app')
	@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Tambah/Ubah Konsumen</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Tambah/Ubah Konsumen</h2>
				</div>
					<div class="panel-body">
						@if($method == 'create')
                        	<form class="form-horizontal tasi-form" method="post" action="{{ url('konsumen/') }}" enctype="multipart/form-data">
                        @else
                			{!! Form::model($data,['url' => url('konsumen/'.$data->id),'method' => 'Put','class' => 'form-horizontal form-label-left']) !!}
						@endif
						{{ csrf_field() }}
                        @include('konsumen._form')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection