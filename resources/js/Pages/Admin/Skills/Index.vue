<template>
    <Layout>
        <div class="card">
            <div class="card-header">
                <Link :href="route('skills.create')">
                    <button class="btn-default"> Создать Скилл </button>
                </Link>
            </div>



            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th ><a @click="orderByDesk()" style="cursor: pointer">ID</a> </th>
                        <th>Имя</th>
                        <th>Тип</th>
                        <th>Дата</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="skill in skills" :key="skill.id">

                        <td><Link :href="route('skills.read',skill.id)">{{skill.id}}</Link></td>
                        <td>{{skill.name}}</td>
                        <td> {{skill.type}}</td>
                        <td> {{skill.created_at}}</td>


                    </tr>
                    </tbody>
                </table>

                <Pagination
                    :links="skills"
                    :route="route('skills.index')"
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
        skills:Array
    },
    name: "Index",

    methods: {
        orderByDesk() {
            let page = window.location.search
            if (page == '?page') {
                page.substring(1)
            }
            if (location.href == route('users.index') + `/?orderBy=1`) {

                return location.href = route('users.index') + `/?orderBy=0` + `&${page}`
            } else {

                return location.href = route('users.index') + `/?orderBy=1` + `&${page}`
            }
        },


    },

    created() {
        console.log(this.skills)
    }


}
</script>

<style scoped>

</style>
