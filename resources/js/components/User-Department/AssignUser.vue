<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <router-link to="/assignments">Assignment List</router-link>
        <div class="card">
          <div class="card-header">Add New Assignment</div>
          <div class="card-body">
            <form name="myform" @submit.prevent="addAssignment" id="myForm">
              <div class="form-group">
                <label for="dep_name">Name</label>
                <!-- <input type="text" class="form-control" name="name" placeholder="Enter dep name"> -->
                <select class="form-control" v-model="users.id" name="user_id">
                  <option v-for="user in users" :value="user.id" :key="user.id">
                    {{ user.name }}
                  </option>
                </select>
              </div>

              <div class="form-group">
                <label for="dep_description">Location</label>
                <select
                  class="form-control"
                  v-model="departments.id"
                  name="department_id"
                >
                  <option
                    v-for="department in departments"
                    :value="department.id"
                    :key="department.id"
                  >
                    {{ department.name }}
                  </option>
                </select>
              </div>

              <div class="form-group">
                <button class="btn btn-primary btn-sm btn-flat" type="submit">
                  Add Assignment
                </button>
              </div>
              <strong> Output:</strong>
              <pre>
 
                      {{ output }}
                      </pre
              >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      department: {},
      output: "",
      users: {},
      departments: {},
      count: 0,
    };
  },
  created() {
    this.axios.get("/api/users/").then((res) => {
      this.users = res.data;
    });

    this.axios.get("/api/departments/").then((res) => {
      this.departments = res.data;
    });
  },
  methods: {
    addAssignment() {
      var formData = new FormData(document.getElementById("myForm"));
      var object = {};
      formData.forEach((value, key) => (object[key] = value));
      let instance = this;
      //check for user assignment
      axios
        .get(
          "/api/checkAssignment/" + object.user_id + "/" + object.department_id
        )
        .then(function (response) {
          console.log(response.data);
          var count = response.data;
          if (count == 0) {
            axios
              .post("/api/assignments/", object)
              .then(function (response) {
                instance.output = response.data;
                flash("Assignment Created Successfully", "success");
              })
              .catch(function (error) {
                console.log(error);
              });
          } else {
            instance.output = "User is already assigned to this department";
              
            flash("Assignment already exists", "error");
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};

//This script works prefect
</script>

<style scoped>
.card-header {
  background-color: #41464b;
  color: white;
}
</style>