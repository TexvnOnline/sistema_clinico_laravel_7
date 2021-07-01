@extends('layouts.admin')
@section('title','Registrar receta')
@section('style')

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.show', $user)}}">{{$user->name}}</a></li>
              <li class="breadcrumb-item active">Registrar receta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            @include('includes._profile')
            <!-- /.card -->
            <!-- About Me Box -->
            @include('admin.users._nav')
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h3 class="card-title">Prescribir recetas</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="form-group">
                    <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#modal-default">
                      Agregar medicamento
                    </button>
                  </div>
                  
                  {!! Form::open(['route'=>['recipes.store', $user], 'method'=>'POST']) !!} 
                  
                  <div class="form-group">
                    <table id="TablaPro" class="table table-sm">
                      <thead>
                          <tr>
                              <th scope="col">Medicamento</th>
                              <th scope="col">Indicaciones</th>
                              <th scope="col">Retirar</th>
                          </tr>
                      </thead>
                      <tbody id="ProSelected"><!--Ingreso un id al tbody-->
                          <tr>
                       
                          </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="form-group">
                    <label for="observations">Observaciones</label>
                    <textarea class="form-control" name="observations" id="observations" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="diagnostic">Diagnostico</label>
                    <textarea class="form-control" name="diagnostic" id="diagnostic" rows="2"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">Guardar</button>
                  </div>
                  
                  {!! Form::close() !!}
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Prescribir medicamento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="medicine">Medicamento</label>
          <input type="text" name="medicine" id="medicine" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="instruction">Indicaciones</label>
          <textarea class="form-control" name="instruction" id="instruction" rows="2" required></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection
@section('script')
<script>
  function RefrescaProducto(){
    var ip = [];
    var i = 0;
    $('#guardar').attr('disabled','disabled'); //Deshabilito el Boton Guardar
    $('.iProduct').each(function(index, element) {
        i++;
        ip.push({ id_pro : $(this).val() });
    });
    // Si la lista de Productos no es vacia Habilito el Boton Guardar
    if (i > 0) {
        $('#guardar').removeAttr('disabled','disabled');
    }
    var ipt=JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
    $('#ListaPro').val(encodeURIComponent(ipt));
  }
   function agregarProducto() {

        // var sel = $('#pro_id').find(':selected').val(); 
        //Capturo el Value del Producto
        // var text = $('#pro_id').find(':selected').text();
        //Capturo el Nombre del Producto- Texto dentro del Select
        
        
       var medicine = $('#medicine').val();
       var instruction = $('#instruction').val();

        
        // var sptext = text.split();
        
        var newtr = '<tr class="item"  data-id="'+medicine+'">';
        newtr = newtr + '<td class="iProduct" > <input type="hidden" name="medicinef[]" value="' +medicine + '">' + medicine + '</td>';
        newtr = newtr + '<td> <input type="hidden" name="instructionf[]" value="' + instruction + '">'+ instruction +'</td>';
      
        
        newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';
        
        $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

        
        RefrescaProducto();//Refresco Productos
        limpiar(); 
        CierraPopup();
        $('.remove-item').off().click(function(e) {
            $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
            if ($('#ProSelected tr.item').length == 0)
                $('#ProSelected .no-item').slideDown(300); 
            RefrescaProducto();
        });        
       $('.iProduct').off().change(function(e) {
            RefrescaProducto();
        });
       
       // cerrar el modal y setear los valores del modal en vacios 
      
  }
  
  function limpiar() {
    $("#medicine").val("");
    $("#instruction").val("");
  }
  function CierraPopup() {
    $("#modal-default").modal('hide');//ocultamos el modal
    
  }
</script>
@endsection