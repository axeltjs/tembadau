@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Daftar Konsumen</li>
            </ul>
            <form method="get" class="form-horizontal tasi-form" action="{{ url('konsumen') }}" >
                <div class="col-sm-10">
                    {{ csrf_field() }}
                    {!! Form::text('q', old('q'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-2">
                    {!! Form::submit('Cari', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
            <br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Konsumen</h2>
				</div>
				<div class="panel-body">
					<p><a href="{{ route('konsumen.create') }}" class="btn btn-primary"> Tambah </a></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{ $item->no_konsumen }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->kontak }} </td>
                                <td>
                                    <a href="{{ url('konsumen/'.$item->id.'/edit') }}" class="btn btn-warning"> Edit</a>
                                    <a data-confirm="Are you sure?" data-token="{{ csrf_token() }}" data-method="DELETE" href="{{ url('konsumen/'.$item->id) }}" class="btn btn-danger"> Delete</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->appends(Request::only('q'))->links() }}
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
