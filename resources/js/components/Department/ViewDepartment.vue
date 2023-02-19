<template>
    <div>
        <router-link to="/">Home</router-link>
     <br>
        <router-link to="/departments">Departments List</router-link>
   
        <router-link to="/departments/create" style="float: right;" class="add">Add</router-link>
     
        <br>
           <div class="panel-body">
              <table class="table primary table-bordered">
          
            <thead>
            <th>ID.</th>
            <th>Name</th>
            <th>Location</th>
            <th>Action</th>
            <th>     </th>
            </thead>
            <tbody>
                <tr v-for="(department, index) in departments" :key="department.id">
                <td>{{index + 1}}</td>
                <td>{{department.name}}</td>
                <td>{{department.location}}</td>
                <td >
                
                        <router-link :to='{ name:"Edit Department" , params:{ id:department.id } }' class="btn btn-success">Edit</router-link>    
              <button type="submit" class="btn btn-danger" @click="deletedepartment(department.id)">
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
        name:"View Department",

        data () {
            this.department = '';
            return {
                departments : [],
                display: true,
                AddNewdepartment: false,
            }
        },

        methods : {
           async viewdepartments() {
                let instance = this;
                axios.get('api/departments')
                    .then(function (response) {
                        instance.departments = response.data;

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            deletedepartment(id){
                 console.log(id);
            if(confirm("Are you sure to delete this department ?")){
               
                this.axios.delete('/api/departments/'+id).then(response=>{
                    this.viewdepartments()
                }).catch(error=>{
                    console.log(error)
                })
            }
            }
        },

        mounted() {
            this.viewdepartments();
        }


    }
</script>