<template>
    <Layout>
        <div class="card">
            <div class="card-header">
                <Link :href="route('users.create')">
                <button class="btn-default"> Создать пользователя </button>
                </Link>
            </div>



            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th ><a @click="orderByDesk()" style="cursor: pointer">ID</a> </th>
                        <th>Имя</th>
                        <th>Герой</th>
                        <th>Дата</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in users.data" :key="user.id">

                        <td><Link :href="route('users.show',user.id)">{{user.id}}</Link></td>
                        <td>{{user.name}}</td>
                        <td> </td>
                        <td> {{user.created_at}}</td>


                    </tr>
                    </tbody>
                </table>

                <Pagination
                    :links="users"
                    :route="route('users.index')"
                />
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../Layout/Layout.vue";
import Pagination from "../Layout/components/Pagination.vue";
import {Link} from "@inertiajs/inertia-vue3";
export default {

    components :{
        Layout,
        Pagination,
        Link
    },
    props: {
        users:Array
    },
    name: "Index",

    methods: {
        orderByDesk() {
            if (location.href == route('users.index') + `/?orderBy=1`) {

           return location.href = route('users.index') + `/?orderBy=0`
            } else {

                return location.href = route('users.index') + `/?orderBy=1`
            }
        },






    },


}
</script>

<style scoped>

</style>
