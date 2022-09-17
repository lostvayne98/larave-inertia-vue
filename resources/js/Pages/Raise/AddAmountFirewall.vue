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

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <th>ID</th>
                    <th>Имя Пользователя</th>
                    <th>Герой</th>
                    <th>Характеристика</th>
                    <th>Описание</th>

                    </thead>
                    <tbody  v-for="raise in raises " :key="raise.id">

                    <td>
                        {{raise.id}}
                    </td>

                    <td>
                        {{raise.users.name }}
                    </td>
                    <td>
                        {{raise.heroes.name}}
                    </td>
                    <td>
                        {{raise.heroes.firewall}}
                    </td>

                    <td>
                        {{raise.description}}
                    </td>

                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success" @click="accept(raise.id)">Принять</button>
                        </div>
                        <div class="btn group">
                            <button class="btn btn-danger" @click="destroy(raise.id)">Отменить</button>

                        </div>
                    </td>

                    </tbody>
                </table>
                <!--                <div v-if="users <15">
                                    <Pagination :links="users.links"/>
                                </div>-->
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
        raises: Array,
    },
    methods:{
        destroy(id){

            if(confirm('Вы Уверены,что хотите отменить заявку?')){
                this.$inertia.post(this.route('destroy.firewall',id))
            }
        },
        accept (id) {
            this.$inertia.post(this.route('add.firewall',id))
        }
    },
    created() {
        console.log(this.$props.raises)
    }


}
</script>

<style scoped>

</style>
