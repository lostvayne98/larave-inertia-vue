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

                            <Link :href="route('users.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
                                Вернуться назад
                            </Link>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{title}}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <form @submit.prevent="update">
                    <div class="card-body">
                        <label >Имя</label>
                        <input v-model="form.name" type="text"  class="form-control" name="name" placeholder="Имя">
                    </div>
                    <div class="card-body">
                        <label >Пароль</label>
                        <input type="password"  v-model="form.password" class="form-control" name="Password" placeholder="password">
                    </div>
                    <!-- /.card-body -->
                    <button class="btn btn-success">Применить</button>
                    <!-- /.card-footer-->
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


</template>

<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';
export default {
    props:{
        title:String,
        user:Object,
    },
    components:{
        Link
    },
    setup(props){
        const form = useForm(   {
            name: null,
            password: null,


        });

        function update() {
            form.put(route('users.update',props.user.id))
        }
        return {form, update};
    }
}
</script>

<style scoped>

</style>

