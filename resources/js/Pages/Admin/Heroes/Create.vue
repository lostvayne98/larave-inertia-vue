<template>
    <Layout >


        <section class="content">
            <div class="container-fluid">







                            <form @submit.prevent="store">
                                <div class="card-body">
                                    <label >Имя</label>
                                    <input v-model="form.name" type="text"  class="form-control" name="name" >
                                </div>
                                <div class="card-body">
                                    <label >Факультет</label>
                                    <input type="text"  v-model="form.faculty" class="form-control"  name="faculty" >
                                </div>
                                <div class="card-body">
                                    <label >Курс</label>
                                    <input v-model="form.course" type="text"  class="form-control" name="course" >
                                </div>
                                <div class="card-body">
                                    <label >Звание</label>
                                    <input v-model="form.rank" type="text"  class="form-control" name="rank" >
                                </div>
                                <div class="card-body">
                                    <label >Биография</label>
                                    <textarea v-model="form.bio" type="text"  class="form-control" name="bio" >
                        </textarea>
                                </div>
                                <div class="card-body">
                                    <label >Квесты</label>
                                    <input v-model="form.quests" type="text"  class="form-control" name="quests" >
                                </div>
                                <div class="card-body">
                                    <label > Скиллы</label>
                                    <div  v-for="(guest, index) in hack" class="card-body">
                                        <label>Хак скилл: {{ index }}
                                            <select v-model="form.hack_skills[index]" type="text"  class="form-control">
                                                <option selected disabled class="">Выберите скилл</option>
                                                <option v-for="hackSkill in hacks" :key="hackSkill.id" :value="hackSkill.id"> {{hackSkill.name}}</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div  v-for="(guest, index) in guests" class="card-body">
                                        <label>Обычный скилл: {{ index }}
                                            <select v-model="form.combat_skills[index]" type="text"  class="form-control">
                                                <option selected disabled class="">Выберите скилл</option>
                                                <option v-for="combatSkill in combats" :key="combatSkill.id" :value="combatSkill.id"> {{combatSkill.name}}</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <!--                    <div class="card-body">
                                                        <label >Обычные скиллы</label>
                                                        <select v-model="form.combatSkills" type="text"  class="form-control">
                                                            <option v-for="combatSkill in combatSkills" :key="combatSkill.id" :value="combatSkill.id"> {{combatSkill.name}}</option>
                                                        </select>
                                                    </div>-->
                                <i class="fa fa-plus-circle" aria-hidden="true" @click="addInput()">Обычный скилл</i>
                                <i class="fa fa-plus-circle" aria-hidden="true" @click="addHack()">Хак скилл</i>
                                <div class="card-body">
                                    <label >Фото</label>
                                    <!--                        <input :v-model="form.photo"  type="file" class="form-control">-->
                                    <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                                </div>
                                <!--                    <div class="card-body">
                                                        <label >Фото</label>
                                                        <input v-model="form.photo" type="file"  class="form-control" name="photo" >
                                                    </div>-->

                                <!-- /.card-body -->
                                <button class="btn btn-success">Применить</button>
                                <!-- /.card-footer-->
                            </form>
                        </div>
                        <!-- /.card -->




        </section>

    </Layout>
</template>

<script>
import {Link, useForm} from '@inertiajs/inertia-vue3';
import Layout from "../Layout/Layout.vue";
export default {
    data(){
        return {
            file: '',
            guests: [],
            hack: []
        }
    },
    methods: {
        handleFileUpload() {
            this.form.photo = this.$refs.file.files[0];
        },
        addInput() {
            console.log('s');
            this.guests.push('New guest');
        },
        addHack() {
            console.log('q');
            this.hack.push('New guest');
        },
    },
    name: "Create",
    components:{
        Layout,
        Link
    },
    props:{
        combats:Array,
        hacks:Array
    },

    setup(){
        const form = useForm(   {
            name: null,
            faculty: null,
            course:null,
            rank:null,
            bio:null,
            quests:null,
            hack_skills: [],
            combat_skills:[],
            photo:null
        });
        function store() {
            form.post(route('heroes.store'))

        }
        return {form, store};
    },


}
</script>

<style scoped>

</style>
