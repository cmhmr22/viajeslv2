@extends('plantilla.p')
@section('titulo', 'Nuevo abono/pago')
@section('design')
								
								
			

                                <div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2><strong>Realizar pago/abono</strong> (Llena cuidadosamente el formulario)</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->
                                    <!--Mensajes que aparecen despues de que se realiza una accion-->
                                        @include('partes.mensajes')
                                        <!--Mensajes que aparecen despues de que se realiza una accion-->
                                    <form action="addPago" method="post" class="form-horizontal form-bordered">
                                    	

                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Cantidad</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" name="abono" placeholder="Cantidad"  >
                                                <span class="help-block">Cuanto va a abonar?</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-user">Anotación</label>
                                            <div class="col-md-9">
                                            	<textarea rows="3" class="form-control" name="comentario" placeholder="Escribe algun comentario (Opcional)" ></textarea>
                                                
                                                <span class="help-block">Coloca un comentario sobre el pago. (Opcional)</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3  control-label" >
                                                Recibe el pago
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cantidad" value="{{\Sv\Usuarios::mi('Nom')}}" readonly>
                                            </div>    

                                        </div>

                                        <!-- Form Buttons -->
							            <div class="form-group form-actions">
							                <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
                                            <input type="hidden" name="idContrato" value="{{$id}}">
							                <div class="col-md-8 col-md-offset-3">
							                    
							                    <button type="submit" class="btn btn-sm btn-primary" id="next4">Abonar</button>
							                </div>
							            </div>
							            <!-- END Form Buttons -->
                                                                           
                                    </form>
                                    <!-- END Horizontal Form Content -->
                                </div>
                                <!-- END Horizontal Form Block -->

                                <div class="block full">
				                            <div class="block-title">
				                                <h2>Lista de <strong>Pagos</strong></h2>
				                            </div>
				                            <p>Esta es la lista de los pagos realizados para el contrato #.</p>
	                                    	<div class="table-responsive">
	                                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
	                                        	<thead>
	                                        		<tr>
	                                        			<th>Fecha</th>
	                                        			
	                                        			<th>Recibió</th>
	                                        			<th>Comentario</th>
	                                        			<th>Cantidad</th>
	                                        			<th>Restan</th>
                                                        <th>Imprimir</th>
	                                        		</tr>
	                                        	</thead>
	                                        	<tbody>
	                                        		
	                                        		{!!\Sv\pagos::Html($id)!!}
	                                        		
	                                        		
	                                        		
	                                        	</tbody>
	                                        </table>
	                                        </div>
	                                    </div>


                <script >
                    document.getElementById("seccionVenta").className = "open";
                    document.getElementById("listaVentas").style.display = "block";
                </script>
                  <script src="js/vendor/jquery.min.js"></script>
                  <script src="js/moment.js"></script>
                <script src="js/moment-with-locales.min.js"></script>
                <script >/// formatea la fecha a una mas comprensible
                moment.locale('es');
                for (var i = 1; i <= 100; i++) {
                    if (document.getElementById(i) instanceof Object) 
                    {
                        t= $('#'+i).val();
                        $('#'+i+'s').append(moment(t).format('LLLL'));
                        
                    }else{ break; }
                }
                

                </script>
                <!-- Load and execute javascript code used only in this page -->
                <script src="js/pages/formsWizard.js"></script>
                <script>$(function(){ FormsWizard.init(); });</script>
@endsection