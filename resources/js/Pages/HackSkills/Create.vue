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
                            <Link :href="route('hack_skills.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
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
                        <label >Скилл</label>
                        <input v-model="form.name" type="text"  class="form-control" name="name" placeholder="Имя">
                    </div>
                    <div class="card-body">
                        <label >Редкость</label>
                        <select  v-model="form.rarity" class="form-control" name="rarity">
                            <option v-for="uni in unic"> {{uni}}</option>

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
    data(){
        return {
            unic: {
                1: 'Обычный',
                2: 'Редкий',
                3: 'Уникальный' ,
                4: 'Сверхъуникальный'
            }
        }
    },
    props:{
        title:String
    },
    components:{
        Link
    },
    setup(){
        const form = useForm(   {
            name: null,
            rarity: null,


        });

        function store() {
            form.post(route('hack_skills.store'))
        }
        return {form, store};
    }
}
</script>

<style scoped>

</style>

