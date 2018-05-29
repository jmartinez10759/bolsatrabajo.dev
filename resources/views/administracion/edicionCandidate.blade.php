<!-- Modal -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Candidato</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask">

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Nombre Completo</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.name" style="text-transform: uppercase;" placeholder="Nombre Completo">
                 <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Correo Electronico</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.email" placeholder="Ingresa correo" disabled>
                 <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Contraseña</label> <font color="red" size="4"></font>
                 <input type="password" class="form-control has-feedback-left"  v-model="fillKeep.password"  placeholder="Ingrese contraseña">
                 <span class="fa fa-inbox form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Telefono</label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.telefono" placeholder="Lada + 10 digitos">
                 <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Codigo Postal</label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.codigo" maxlength="5" >
                 <span class="fa fa-paper-plane form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Direccion </label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.direccion" style="text-transform: uppercase;" placeholder="Ingrese direccion">
                 <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>CURP</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left"  v-model="fillKeep.curp" style="text-transform: uppercase;" placeholder="ingrese curp">
                 <span class="fa fa-pencil-square form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label for=""></label>
                 <label>Estado</label> <font color="red" size="4"></font>
                 <select class="form-control" v-model="fillKeep.id_state">
                   <option :value="estados.id" v-for="estados in datos.estados">@{{ estados.nombre }}</option>
                 </select>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Descripción</label> <font color="red" size="4">*</font>
                 <textarea class="form-control"  v-model="fillKeep.descripcion" ></textarea>

               </div>

        </form>
        <font color="red" size="5">*</font> Campos Obligatorios
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>  Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click.prevent="update_candidate()" ><i class="fa fa-save"></i> Actualizar </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Candidato</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask">

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Nombre Completo</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left" id="name" v-model="newKeep.name" style="text-transform: uppercase;" placeholder="Nombre Completo">
                 <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Correo Electronico</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left" id="correo" v-model="newKeep.email" placeholder="Ingresa correo">
                 <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Contraseña</label> <font color="red" size="4">*</font>
                 <input type="password" class="form-control has-feedback-left" id="password" v-model="newKeep.password"  placeholder="Ingrese contraseña">
                 <span class="fa fa-inbox form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Telefono</label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left" id="phone" v-model="newKeep.telefono" placeholder="Lada + 10 digitos">
                 <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Codigo Postal</label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left" id="codigo" v-model="newKeep.codigo" maxlength="5" >
                 <span class="fa fa-paper-plane form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Direccion </label> <font color="red" size="4"></font>
                 <input type="text" class="form-control has-feedback-left" id="address" v-model="newKeep.direccion" style="text-transform: uppercase;" placeholder="Ingrese direccion">
                 <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>CURP</label> <font color="red" size="4">*</font>
                 <input type="text" class="form-control has-feedback-left" id="curp" v-model="newKeep.curp" style="text-transform: uppercase;" placeholder="ingrese curp">
                 <span class="fa fa-pencil-square form-control-feedback left" aria-hidden="true"></span>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label for=""></label>
                 <label>Estado</label> <font color="red" size="4"></font>
                 <select class="form-control" v-model="datos.id_state">
                    <option :value="estados.id" v-for="estados in datos.estados">@{{ estados.nombre }}</option>
                 </select>
               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <label>Descripción</label> <font color="red" size="4">*</font>
                 <textarea class="form-control" id="description" v-model="newKeep.descripcion" ></textarea>

               </div>

        </form>
        <font color="red" size="5">*</font> Campos Obligatorios
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>  Cerrar</button>
        <button type="button" class="btn btn-primary" v-on:click.prevent="insert_candidate()" ><i class="fa fa-save"></i> Guardar</button>
      </div>
    </div>
  </div>
</div>
