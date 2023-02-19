<template>
      <div class="container">
       
   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <router-link to="/users">Users List</router-link>
                <div class="card">
                <div class="card-header">Update User</div>
                <div class="card-body">
        <form name="myform" @submit.prevent="UpdateUser (user.id)" id="myForm">
            <div class="form-group">
                <label for="user_name">Name</label>
                <input type="text" class="form-control" name="name" v-model="user.name">
            </div>

            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="text" name="email" id="" cols="30" rows="10" class="form-control" v-model="user.email"> </div>

            <div class="form-group">
                <label for="user_phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" v-model="user.phone_number">
            </div>

         
            <div class="form-group">
                <button class="btn btn-primary btn-sm btn-flat" type="submit">Update User</button>
            </div>
            
            <strong> Output:</strong> 
                        <pre> 
                        {{output}}
                        </pre> 
        </form>
    </div></div></div></div></div>
</template>

<script>
    export default {
        name: "UpdateItem",
        data () {
            return {
                user : [],
                output: ''
            }
        },
        created(){
            this.axios.get('/api/users/'+this.$route.params.id).then((res)=> 
                    {this.user = res.data;});
                 },

        methods : {
            UpdateUser(id) {
                var formData = new FormData(document.getElementById("myForm"));
                var object = {};
                formData.forEach((value, key) => object[key] = value);
                let instance = this;
                axios.put('/api/users/'+id, object)
                    .then(function (response) {
                       instance.output = response.data;
                        flash('User Created Successfully', 'success');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
              mounted() {
    // Use the parent function directly here
    this.method();
  }

        }
    }
    //This script works prefect
</script>

<style scoped>
.card-header{
    background-color: #41464b;
    color: white;
}
</style>