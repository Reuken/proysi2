@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">

				<!-- Default box 
				<div class="box">
					<div class="box-header with-border">
						<i class="fa fa-bar-chart"></i><h3 class="box-title">Grafica de movimientos</h3>
					</div>
					<div class="col-sm-12 add_top_10">
						<form id="form_filter">
							<div class="form-group col-sm-5">
								<input type="date" name="start" id="start" class="form-control">
							</div>
							<div class="form-group col-sm-5">
								<input type="date" name="finish" id="finish" class="form-control">
							</div>
							<div class="form-group col-sm-2">
								<a href="javascript:void(0)" id="filter_btn" class="btn btn-sm btn-default form-control"><i class="fa fa-filter"></i> Filtrar</a>
							</div>
						</form>
						
					</div>
					<div class="box-body">
						<canvas id="myChart" class="col-sm-12"></canvas>
						<center><label>Abonos&nbsp; </label><label class="entrada" >&nbsp;&nbsp;&nbsp;&nbsp; </label> &nbsp;&nbsp;  <label>Retiros &nbsp;</label><label class="salida" > &nbsp;&nbsp;&nbsp;&nbsp;</label></center>
					</div>
				</div>
				-->
			</div>
		</div>
	</div>
@endsection
