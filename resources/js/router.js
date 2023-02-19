import ViewUser from './components/User/ViewUser.vue';
import CreateUser from './components/User/CreateUser.vue';
import UpdateUser from './components/User/UpdateUser.vue';

import ViewDepartment from './components/Department/ViewDepartment.vue';
import CreateDepartment from './components/Department/CreateDepartment';
import UpdateDepartment from './components/Department/UpdateDepartment';

import ViewAssignment from './components/User-Department/ViewAssignment';
import AssignUser from './components/User-Department/AssignUser';
import UpdateAssignment from './components/User-Department/UpdateAssignment';


import Dashboard from './components/DashboardCompnent.vue';

window.flash = function(message) {
    window.event.$emit('flash',message);
}


export const routes = [{
        name: 'home',
        path: '/',
        component: Dashboard
    },
    {
        name: 'User List',
        path: '/users',
        component: ViewUser
    },
    {
        name: 'Create User',
        path: '/users/create',
        component: CreateUser
    },
    {
        name: 'Edit User',
        path: '/users/edit/:id',
        component: UpdateUser
    },
    {
        name: 'Department List',
        path: '/departments',
        component: ViewDepartment
    },
    {
        name: 'Create Department',
        path: '/departments/create',
        component: CreateDepartment
    },
    {
        name: 'Edit Department',
        path: '/departments/edit/:id',
        component: UpdateDepartment
    },
    {
        name: 'Assignment List',
        path: '/assignments',
        component: ViewAssignment
    },
    {
        name: 'Assign User',
        path: '/assignments/create',
        component: AssignUser
    },
    {
        name: 'Edit Assignment',
        path: '/assignments/edit/:id',
        component: UpdateAssignment
    }
];