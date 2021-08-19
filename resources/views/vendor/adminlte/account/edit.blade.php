@extends('adminlte::layouts.app')




@section('main-content')

		<div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bank"></i><h3 class="box-title">Editar Cuenta</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action = "/account/editar/{{$data->id}}" method="post">
            {{method_field('PUT')}}
             {{ csrf_field() }}
           
              <div class="box-body">
                <div class="form-group">
                <label for="exampleInputPassword1">Cuenta</label>
                <select class="form-control" id="cuenta_id" name="cuenta_id" required  name="type">
                  @foreach($cuentas as $cuenta)
                    <option value="{{ $cuenta->id }}">{{ $cuenta->name }}</option>
                  @endforeach
                </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" required maxlength="200" name="name" value="{{$data->name}}" class="form-control" placeholder="Nombre del banco">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Número de cuenta</label>
                  <input name="number" required maxlength="200" value="{{$data->number}}"  class="form-control"  placeholder="Numero de cuenta">
                </div>
                <div class="form-group">
                	<label  for="exampleInputPassword1">Tipo de Cuenta</label>

                	<select  required  class="form-control" name="type">
                    <option value=""></option>
							       <option value="ahorro">
                			ahorro
                			</option>
                			<option value="corriente" >
                			corriente
							       </option>
                   </select>
	                
		        </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
        </div>
												

	

@endsection
