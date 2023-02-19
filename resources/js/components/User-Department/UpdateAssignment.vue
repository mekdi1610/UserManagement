<template>
    <div class="container">
     
 
      <div class="row justify-content-center">
          <div class="col-md-8">
              <router-link to="/assignments">Assignment List</router-link>
              <div class="card">
              <div class="card-header">Update Assignment</div>
              <div class="card-body">
      <form name="myform" @submit.prevent="UpdateAssignment(assignments.user_dep_id)" id="myForm">
          <div class="form-group">
              <label for="dep">Change Department</label>
              <input type="text" v-model = "assignments.dep">
          <select class="form-control" v-model="selectedVal" name="department_id">
            <option v-for="allDepartment in allDepartments" :key="allDepartment.id" :value="allDepartment.id">{{allDepartment.name}}</option>
       </select>
       
          </div>
          <div class="form-group">
              <button class="btn btn-primary btn-sm btn-flat" type="submit">Update Assignment</button>
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
      name: "UpdateAssignment",
      data () {
          return {
            assignments : [],
            selectedVal : "",
            user_department : [],
              allDepartments : [],
              department : [],
              output: ''
          }
      },
      created(){
        console.log(this.$route.params.id)
          this.axios.get('/api/getAssignmentByID/'+this.$route.params.id).then((res)=> 
                  {console.log(res.data.length)
                    var temp = res.data;
                    for (var key in temp ) {
                    this.assignments = temp[key];
                      this.selectedVal = this.assignments.dep_id;
                    }
                   
            });
      
               
        this.axios.get('/api/departments/').then((res)=> 
            {this.allDepartments = res.data;});
        },

      methods : {
          UpdateAssignment(id) {
              var formData = new FormData(document.getElementById("myForm"));
              var object = {};
              formData.forEach((value, key) => object[key] = value);
              let instance = this;
              console.log(object)
              axios.put('/api/assignments/'+id, object)
                  .then(function (response) {
                     instance.output = response.data;
                      flash('User Assigned Successfully', 'success');
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