<template>
    <div>
        <router-link to="/">Home</router-link>
     <br>
 
        <router-link to="/users">Users List</router-link>
   
        <router-link to="/users/create" style="float: right;" class="add">Add</router-link>
     
        <br>
           <div class="panel-body">
              <table class="table primary table-bordered">
          
            <thead>
            <th>ID.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Action</th>
            <th>     </th>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users" :key="user.id">
                <td>{{index + 1}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.phone_number}}</td>
                <td >
                
                        <router-link :to='{ name:"Edit User" , params:{ id:user.id } }' class="btn btn-success">Edit</router-link>    
                        <!-- <router-link to="/edit/${user.id}">Edit</router-link> -->
               
                          <!-- class="btn btn-success" @click="displayUpdate(user)" v-bind:selecteduser="user">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
            </button> -->
              <button type="submit" class="btn btn-danger" @click="deleteUser(user.id)">
            <i class="fa fa-trash-o" aria-hidden="true"></i>Delete
            </button>
                </td>
                  
            </tr>
            </tbody>
        </table>
     
           </div>
   
    </div>
</template>

<style>

</style>

<script>
    export default  {
        name:"Viewusers",

        data () {
            this.user = '';
            return {
                users : [],
                display: true,
                AddNewuser: false,
            }
        },

        methods : {
           async viewusers() {
                let instance = this;
                axios.get('api/users')
                    .then(function (response) {
                        instance.users = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            deleteUser(id){
            if(confirm("Are you sure to delete this user ?")){
               
                this.axios.delete('/api/users/'+id).then(response=>{
                    this.viewusers()
                }).catch(error=>{
                    console.log(error)
                })
            }
            }
        },

        mounted() {
            this.viewusers();
        }


    }
</script>