@extends('adminlte::layouts.app')

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12 ">
                <div class="box-body">
                    <div class="container-fluid spark-screen" ng-controller="listusersController">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-admin-border">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><b>Libro Diario</b></h3>
                                    </div>
                                    <div class="box-body responsive-table">

                                        <div id="lista_item_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="accounts" class="display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                    <th>Fecha</th>
                                                                    <th>Monto</th>
                                                                    <th>Impuesto</th>
                                                                    <th>Cuenta</th>
                                                                    <th>Tipo</th>
                                                                    <th>Concepto</th>
                                                            </tr>
                                                        </thead>
                                                      
                                                        <tbody>
                                                             @foreach ($summarys as $summary)
                                                                <tr>
                                                                    @if( $summary->created_at )
                                                                    <?php  $datef= date_create($summary->created_at); 
                                                                     $fecha=date_format($datef, 'd-m-Y ');
                                                                    ?>
                                                                    @endif
                                                                    <td>{{ $fecha }}</td> 
                                                                    <td>{{ number_format($summary->amount, 2, '.', ',') }} {{$divisa->value}}</td>
                                                                    <td>{{ number_format($summary->tax, 2, '.', ',') }} </td>
                                                                    <td>{{ $summary->account->name }} </td>
                                                                    <!-- <td>{{ $summary->created_at }}</td> -->
                                                                    @if($summary->type=="add")
                                                                    <td>Abono <small class="label pull-right bg-primary"><i class="fa fa-sort-up"></i></small></td>
                                                                    @else
                                                                    <td>Retiro <small class="label pull-right bg-red"><i class="fa fa-sort-desc"></i></small></td>
                                                                    @endif
                                                                    <td>{{ $summary->concept }}</td>
                                                                </tr>
                                                                @endforeach
                                                        </tbody>     
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
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
                                          <h3>{{ number_format($totalf, 2, '.', ',') }}</h3>

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
    </div>
@endsection
