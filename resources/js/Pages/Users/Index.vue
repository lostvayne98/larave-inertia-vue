<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{title}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><Link :href="route('users.create')">Создать пользователя</Link>
                            </li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->


    <div class="row">
        <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                <th>ID</th>
                <th>Имя</th>
                <th>Фото</th>

                </thead>
                <tbody  v-for="user in users.data" :key="user.id">

                    <td>
                        {{user.id}}
                    </td>

                    <td>
                        {{user.name }}
                    </td>
                    <td>
                        2
                    </td>


                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-default"><i class="fas fa-eye"></i></a>

                    </div>
                </td>
                <td>
                    <div class="btn-group">
                    <button class="btn-danger" @click="destroy(user.id)">Удалить</button>
                    </div>
                </td>

                </tbody>
            </table>
            <div v-if="users <15">
            <Pagination :links="users.links"/>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import Pagination from "../../Layout/Pagination";
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components:{ Link , Pagination},
    props: {
        title: String,
        users: Array
    },
    methods:{
        destroy(id){

            if(confirm('Вы Уверены,что хотите удалить пользователя?')){
                this.$inertia.delete(this.route('users.destroy',id))
            }
        }
    }

}
</script>

<style scoped>

</style>
