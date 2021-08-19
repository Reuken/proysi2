@extends('adminlte::layouts.app')
@section('main-content')

	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12 ">
				<div class="box-body">
					<div class="container-fluid spark-screen">
						<div class="row">
							<div class="col-md-12">
								<div class="box box-admin-border">
									<div class="box-header with-border">
										<i class="fa fa-credit-card"></i><h3 class="box-title"><b>Montos Totales</b></h3>
										
									</div>
									
									<div class="box-body responsive-table">

										<div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div class="row">
												<div class="col-sm-12">
													<table id="total" class="display" cellspacing="0" width="100%">
							                            <thead>
							                                <tr>				
																<th>Nombre de cuenta</th>
																<th>tipo de cuenta</th>
																<th>Numero</th>
																<th>Saldo</th>
																<th>Movimientos</th>
							                                </tr>
							                            </thead>
							                            <tbody>
															    @foreach ($summary as $summarys)
															    <tr>
															    	<td>{{ $summarys->name }}</td>
															    	<td>{{ $summarys->type}}</td>
															    	<td>{{ $summarys->number }}</td>
															    	<td><n class="n">{{ number_format($summarys->total, 2, '.', ',') }}</n> {{$divisa->value}}
															    	 </td>
															    	 <td><center><a class="btn btn-sm btn-default"  href="/account/detalle/{{ $summarys->id }}"><i class="fa fa fa-eye"></i></a></center></td>
															    </tr>  
															    @endforeach
														</tbody>
		                          					</table>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
								<div class="col-md-3 col-sm-6 col-xs-12 "> 

									<div class="small-box box">
							            <div class="inner">
							              <h3>{{ number_format($totalfinal, 2, '.', ',') }}</h3>
							              <p>{{$divisa->value}}</p>
							            </div>
							            <div class="icon">
							              <i class="fa fa-money"></i>
							            </div>
							            <label class="small-box-footer">
							              Saldo Total 
							            </label>
							          </div>
							    </div>

@endsection
