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
                            <li class="breadcrumb-item"><Link :href="route('admins.create')">Создать пользователя</Link>
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
                    <tbody  v-for="admin in admins" :key="admin.id">

                    <td>
                        {{admin.id}}
                    </td>

                    <td>
                        {{admin.name }}
                    </td>
                    <td>
                        2
                    </td>


                    <td>
                        <div class="btn-group">
                            <Link :href="route('admins.show',admin.id)" class="btn btn-default"><i class="fas fa-eye"></i></Link>

                        </div>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn-danger" @click="destroy(admin.id)">Удалить</button>
                        </div>
                    </td>

                    </tbody>
                </table>
                <div v-if="admins <15">
                    <Pagination :links="admins.links"/>
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
        admins: Array
    },
    methods:{
        destroy(id){

            if(confirm('Вы Уверены,что хотите удалить пользователя?')){
                this.$inertia.delete(this.route('admins.destroy',id))
            }
        }
    }

}
</script>

<style scoped>

</style>
