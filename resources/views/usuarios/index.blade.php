@extends('layouts.master')

@section('css')

<link href="{{ asset('plugins/datatable/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('header')
<div class="block-header">
    <h2>USUARIOS</h2>
</div>
@endsection

@section('content')
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Usuarios
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                  <li>
                                      <a href="#" data-toggle="modal" data-target="#defaultModal">
                                          <i class="material-icons">add_circle</i>
                                      </a>
                                  </li>
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('usuario.create') }}">Nuevo</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#defaultModal">Nuevo Modal</a></li>
                                        <!-- <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">MODAL - DEFAULT SIZE</button> -->

                                        <!-- <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>USERNAME</th>
                                            <th>AVATAR</th>
                                            <th>EMAIL</th>
                                            <th>CREADO</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>USERNAME</th>
                                            <th>AVATAR</th>
                                            <th>EMAIL</th>
                                            <th>CREADO</th>
                                            <th>ACCION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $dato)
                                           <tr>
                                              <td> {{ $dato->id }}</td>
                                              <td> {{ $dato->name }}</td>
                                              <td> {{ $dato->username }}</td>
                                              <td>
                                                  @if ($dato->avatar <> null)
                                                    <img src="{{ route('image.displayImage',$dato->avatar) }}" alt="" title="">
                                                  @else

                                                  @endif
                                            </td>
                                              <td> {{ $dato->email }}</td>
                                              <td> {{ $dato->created_at }}</td>
                                               <td>

                                                   <a href="{{route ('usuario.edit',$dato->id)}}" class="btn btn-xs btn-primary waves-effect">
													    <i class="material-icons" style="font-size: 16px;">edit</i>
                                                   </a>
                                                   <form method='POST'
                                                         action="{{route('usuario.destroy',$dato['id'])}}"
                                                         style="display:inline"
                                                         class="validar"
                                                         name="formulario1">
                                                         {{csrf_field()}}
                                                         <input type="hidden" name="_method" value="DELETE">
                                                         <button class="btn btn-xs btn-danger waves-effect" >
                                                           <i class="material-icons" style="font-size: 16px;">delete</i>
                                                         </button>

                                                   </form>
                                               </td>
                                           </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- -----------------------------Modal ----------------------------------------------------------------------------->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Nuevo Usuario</h4>
                        </div>
                     <form id="form_validation" method="POST" enctype = "multipart/form-data" action="{{ route('usuario.store') }} ">
                        <div class="modal-body">
                                 {{ csrf_field() }}
                                 <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input id="nombre" type="text" class="form-control" name="name" required>
                                          <label id="nombre" class="form-label">Nombre</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input id="username" type="text" class="form-control" name="username" required>
                                          <label id="username" class="form-label">Username</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="email" class="form-control" name="email" required>
                                          <label class="form-label">Email</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" class="form-control" name="password" required id="password">
                                          <label class="form-label">Password</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" class="form-control" name="password_confirmation" required>
                                          <label class="form-label">Confirmar Password</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                    <label for="exampleFormControlFile1">Avatar</label>
                                    <input type="file" class="form-control-file" name="avatar" accept=".png, jpg">
                                  </div>



                        </div>
                        <div class="modal-footer">

                             <button class="btn btn-primary waves-effect" type="submit">CREAR</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
<!-- -----------------------------Modal ----------------------------------------------------------------------------->
@endsection

@section('js')

<script src="{{ asset('plugins/datatable/jquery.dataTables.js') }}" defer></script>
<script src="{{ asset('plugins/datatable/jquery-datatable.js') }}" defer></script>
<script src="{{ asset('plugins/datatable/dataTables.bootstrap.js') }}" defer></script>
<script src="{{ asset('plugins/datatable/dataTables.buttons.min.js') }}" defer></script>
<script src="{{ asset('plugins/datatable/buttons.flash.min.js') }}" defer></script>
<script>
  $(function () {

    $('#usuarios').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'select'      : true,
      'stateSave'   : true,
      "scrollX"     : true,
       language     : {
        search:         "Buscar:",
        sLengthMenu:     "Mostrar _MENU_ registros",
        sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "oPaginate":
        {
          "sFirst":    "Primero",
          "sLast":     "??ltimo",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
     }
    });


  })
</script>
<script>
$(".validar").on('submit', function(e) {
        var form = $(this);
        e.preventDefault();
        Swal({
          title: 'Estas seguro?',
          text: 'Esta accion no podra ser revertida!',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Borra esto!',
          confirmButtonColor: '#d33',
          cancelButtonText: 'No'
        }).then((result) => {
          if (result.value) {
            this.submit();
            http://abogados.test/
          // For more information about handling dismissals please visit
          // https://sweetalert2.github.io/#handling-dismissals
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            /*Swal(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )*/
          }
        })
    });


</script>

@endsection
