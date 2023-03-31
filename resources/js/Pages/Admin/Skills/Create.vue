<template>
<Layout>
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

        <div class="card-body">
            <label>Тип</label>
            <select v-model="form.type">
                <option value="hack">Хак скилл</option>
                <option value="combat">Обычный скилл</option>

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


</Layout>
</template>

<script>
import Layout from "../Layout/Layout.vue";
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

    components:{
        Link,
        Layout
    },
    setup(){
        const form = useForm(   {
            name: null,
            rarity: null,
            type:null
        });
        function store() {
            form.post(route('skills.store'))

        }
        return {form, store};
    }
}
</script>
