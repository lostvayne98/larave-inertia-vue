<template>
    <Layout>
        <!-- Main content -->
        <section class="content">


                <form @submit.prevent="update">
                    <div class="card-body">
                        <label >Имя</label>
                        <input v-model="form.name" type="text"  class="form-control" name="name" :placeholder="user.name">
                    </div>
                    <div class="card-body">
                        <label >Пароль</label>
                        <input type="password"  v-model="form.password" class="form-control" name="Password" placeholder="password">
                    </div>
                    <div class="card-body">
                        <label >Герои</label>
                        <select   v-model="form.hero_id" class="form-control" name="hero_id">
                            <option v-for="hero in heroes " :key="hero.id" :value="hero.id">
                                {{hero.name}}
                            </option>
                        </select>
                    </div>
                    <!-- /.card-body -->
                    <button class="btn btn-success">Применить</button>
                    <!-- /.card-footer-->
                </form>

            <!-- /.card -->

        </section>
        <!-- /.content -->

    </Layout>
</template>

<script>
import Layout from "../Layout/Layout.vue";
import {Link, useForm} from '@inertiajs/inertia-vue3';
export default {
    components:{
        Layout,
        Link
    },
    name: "Update",
    props: {
        user:Object,
        heroes:Array
    },
    setup(props){
        const form = useForm(   {
            name: null,
            password: null,
            hero_id:null
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
