<template>
    <div class="container">
     
 
      <div class="row justify-content-center">
          <div class="col-md-8">
              <router-link to="/departments">Departments List</router-link>
              <div class="card">
              <div class="card-header">Update Department</div>
              <div class="card-body">
      <form name="myform" @submit.prevent="UpdateDepartment(department.id)" id="myForm">
          <div class="form-group">
              <label for="dep_name">Name</label>
              <input type="text" class="form-control" name="name" v-model="department.name">
          </div>

          <div class="form-group">
              <label for="dep_location">Location</label>
              <input type="text" name="location" id="" cols="30" rows="10" class="form-control" v-model="department.location"> </div>

       
          <div class="form-group">
              <button class="btn btn-primary btn-sm btn-flat" type="submit">Update Department</button>
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
      name: "UpdateDepartment",
      data () {
          return {
              department : [],
              output: ''
          }
      },
      created(){
          this.axios.get('/api/departments/'+this.$route.params.id).then((res)=> 
                  {this.department = res.data;});
               },

      methods : {
          UpdateDepartment(id) {
              var formData = new FormData(document.getElementById("myForm"));
              var object = {};
              formData.forEach((value, key) => object[key] = value);
              let instance = this;
              axios.put('/api/departments/'+id, object)
                  .then(function (response) {
                     instance.output = response.data;
                      flash('Department Created Successfully', 'success');
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