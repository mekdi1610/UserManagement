<template>
    <div>
        <router-link to="/">Home</router-link>
     <br>
        <router-link to="/assignments">User-assignments List</router-link>
   
        <router-link to="/assignments/create" style="float: right;" class="add">Add</router-link>
     
        <br>

 
           <div class="panel-body">
              <table class="table primary table-bordered">
          
            <thead>
                <th>ID</th>
            <th>Department Name.</th>
            <th>Location</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>     </th>
            </thead>
            <tbody>
                <tr v-for="(assignment, index) in assignments" :key="assignment.id">
                <td>{{index + 1}}</td>
                <td>{{assignment.dep}}</td>
                <td>{{assignment.location}}</td>
                <td>{{assignment.name}}</td>
                <td>{{assignment.email}}</td>
                <td>{{assignment.phoneno}}</td>
                <td >
                        <router-link :to='{ name:"Edit Assignment" , params:{ id: assignment.user_dep_id} }' class="btn btn-success">Edit</router-link>    
              <button type="submit" class="btn btn-danger" @click="deletedepartment(assignment.id)">
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
        name:"ViewAssignment",

        data () {
            this.assignment = '';
            return {
                assignments : [],
                user_department : [],
                display: true,
                AddNewdepartment: false,
            }
        },

        methods : {
           async viewassignments() {
                let instance = this;

                axios.get('api/assignmentswithPivot')
                    .then(function (response) {
                        instance.assignments = response.data;

                    })
                    .catch(function (error) {
                        console.log(error);
                    });


            },
            deletedepartment(id){
            if(confirm("Are you sure to delete this assignment ?")){
               
                this.axios.delete('/api/assignments/'+id).then(response=>{
                    this.viewassignments()
                }).catch(error=>{
                    console.log(error)
                })
            }
            }
        },

        mounted() {
            this.viewassignments();
        }


    }
</script>