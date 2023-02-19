<template>
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <router-link to="/users">Users List</router-link>
                <div class="card">
                <div class="card-header">Add New User</div>
                <div class="card-body">
        <form name="myform" @submit.prevent="addUser" id="myForm">
            <div class="form-group">
                <label for="item_name">Name</label>
                <!-- <input type="text" class="form-control" name="name" placeholder="Enter item name"> -->
                <input type="text" name="name" class="form-control" v-model="user.name">
                 
            </div>

            <div class="form-group">
                <label for="item_description">Email</label>
                <input type="text" name="email" id="" cols="30" rows="10" class="form-control" v-model="user.email">
            </div>

            <div class="form-group">
                <label for="item_catagory">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" v-model="user.phone_nunber">
            </div>

          
            <div class="form-group">
                <button class="btn btn-primary btn-sm btn-flat" type="submit">Add User</button>
            </div>
            <strong> Output:</strong> 
                        <pre> 
                        {{output}}
                        </pre> 
        </form>
    </div></div></div></div></div>
</template>

<script>
    export default{
        data(){
            return{user:{}, output: ''}
               },
        methods:{
            addUser(){
                var formData = new FormData(document.getElementById("myForm"));
                var object = {};
                formData.forEach((value, key) => object[key] = value);
                let instance = this;
                axios.post('/api/users/', object)
                    .then(function (response) {
                        instance.output = response.data;
                        flash('User Created Successfully', 'success');
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
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