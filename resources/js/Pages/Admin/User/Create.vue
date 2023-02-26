<template>
    <Layout>


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quick Example</h3>
                            </div>


                            <form @submit.prevent="store">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">name</label>
                                        <input type="text" v-model="form.name" class="form-control" id="exampleInputPassword1" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" v-model="form.password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hero</label>
                                        <select v-model="form.hero_id">
                                            <option></option>
                                        </select>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>-->
<!--                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>-->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </Layout>

</template>

<script>
import Layout from "../Layout/Layout.vue";
import {Link, useForm} from '@inertiajs/inertia-vue3';
export default {
    name: "Create",
    components:{
        Layout,
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
