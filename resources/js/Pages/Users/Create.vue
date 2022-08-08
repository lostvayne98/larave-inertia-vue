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
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <form @submit.prevent="store">
                <div class="card-body">
                    <label >Имя</label>
                    <input v-model="form.name" type="text"  class="form-control" name="name" placeholder="Имя">
                </div>
                <div class="card-body">
                    <label >Пароль</label>
                    <input type="password"  v-model="form.password" class="form-control" name="Password" placeholder="password">
                </div>
                    <div class="card-body">
                        <label >Герои</label>
                        <select v-model="form.hero_id" type="text"  class="form-control">
                            <option v-for="hero in heroes" :key="hero.id" :value="hero.id"> {{hero.name}}</option>
                        </select>
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
    components:{
        Link
    },
    props:{
        heroes:Array
    },
    setup(){
    const form = useForm(   {
        name: null,
        password: null,
        hero_id: null


    });

    function store() {
        form.post(route('users.store'))
    }
    return {form, store};
    }
}
</script>

<style scoped>

</style>

