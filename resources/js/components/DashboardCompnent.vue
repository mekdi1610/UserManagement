<template>
    <div class="container">
    
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
              <div class="card-header" style="text-align: center;">User Management Dashboard</div>
              <div class="card-body">
         
          <div class="form-group">
              <button class="form-control">
                <router-link to="/users">Users</router-link>
   
              </button>
              </div>
              <button class="form-control">
                <router-link to="/departments">Departments</router-link>
   
              </button>
              <button class="form-control">
                <router-link to="/assignments">User Assignments</router-link>
   
              </button>

          </div>
  </div></div></div></div>
</template>

<script>
  export default {
      name: "Dashboard"
  }

</script>
