<template>
    <div class="container">
       <div class="row mt-5">
        <div class="col-md-10 col-md-offset-1.5">
          <div class="card">
            <div class="card-header">
              <h4>Usuarios</h4>

              <div class="card-tools">
                  <button class="btn-primary" data-toggle="modal" data-target="#nuevoM">Agregar
                      <i class="fas fa-user-plus fa-fw"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body table-responsive p-2">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Tipo</th>
                  <th>Fecha de Registo</th>
                  <th>Editar</th>

                </tr>


                <tr v-for="user in users" :key="user.id">
                  <td>{{user.id}}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.type | upText}}</td>
                  <td>{{user.created_at | mydate}}</td>

                  <td>
                      <a href="">
                          <i class="fa fa-edit"></i>
                      </a>
                      /
                      <a href="">
                          <i class="fa fa-trash"></i>
                      </a>
                  </td>
                </tr>

            </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


    <!-- Modal -->
<div class="modal fade" id="nuevoM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoM">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="createUser">
      <div class="modal-body">
      <div class="form-group">
            <input v-model="form.name" type="text" name="name"
                placeholder="Nombre"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
            <has-error :form="form" field="name"></has-error>
        </div>

        <div class="form-group">
            <input v-model="form.email" type="text" name="email"
                placeholder="Correo Electronico"
                class="form-control" :class="{ 'invalido': form.errors.has('email') }">
            <has-error :form="form" field="email"></has-error>
        </div>

        <div class="form-group">
            <textarea v-model="form.bio" type="text" name="bio"
                placeholder="breve biografía para el usuario"
                class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
            <has-error :form="form" field="bio"></has-error>
        </div>

        <div class="form-group">
           <select name="type" v-model="form.type" id="type" class="form-control form-control-lg" :class="{
               'is-invalid': form.errors.has('type')}">

               <option value="usu">Tipo de administradores</option>
               <option value="administrador">Administadror</option>
               <option value="usuario">Usuario Normal</option>
               <option value="autor">Autores</option>

           </select>
           <has-error :form="form" field="type"></has-error>
        </div>

        <div class="form-group">
            <input v-model="form.password" type="password" name="password"
                placeholder="Contraseña"
                class="form-control" :class="{ 'is-invalid': form.errors.has('Contraseña') }">
            <has-error :form="form" field="Contraseña"></has-error>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>

      </form>

    </div>
  </div>
</div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                users : {},
                form: new Form({
                    name: '',
                    email:'',
                    password:'',
                    type:'',
                    bio:'',
                    photo:''
                })
            }
        },
        methods:{
            loadUsers(){
                axios.get("api/user").then(({data}) => (this.users = data.data));
            },

            createUser(){
                this.$Progress.start();
                this.form.post('api/user');

                $('#nuevoM').modal('hide')

                 toast.fire({
                    type: 'success',
                    title: 'Usuario agregado correctamente'
                    })

                this.$Progress.finish();
            }
        },
        created() {
            this.loadUsers();
            setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>

