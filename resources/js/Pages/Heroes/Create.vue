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
                            <Link :href="route('heroes.index')" class="text-indigo-600 hover:text-indigo-900 my-5 block">
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
                        <div  v-for="(hacks, index) in hack" class="card-body">
                            <label>Хак скилл: {{ index }}
                                <select v-model="form.hackSkills[index]" type="text"  class="form-control">
                                    <option selected disabled class="">Выберите скилл</option>
                                    <option v-for="hackSkill in hackSkills" :key="hackSkill.id" :value="hackSkill.id"> {{hackSkill.name}}</option>
                                </select>
                            </label>
                        </div>
                    <div  v-for="(guest, index) in guests" class="card-body">
                        <label>Обычный скилл: {{ index }}
                            <select v-model="form.combatSkills[index]" type="text"  class="form-control">
                                <option selected disabled class="">Выберите скилл</option>
                                <option v-for="combatSkill in combatSkills" :key="combatSkill.id" :value="combatSkill.id"> {{combatSkill.name}}</option>
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
        hackSkills:Array,
        combatSkills: Array,
        title:String
    },
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
        addHack () {
            console.log('q');
            this.hack.push('New guest');
        },
    },
    setup(){
        const form = useForm(   {
            name: null,
            faculty: null,
            course:null,
            rank:null,
            bio:null,
            quests:null,
            hackSkills: [],
            combatSkills:[],
            photo:null

        });

        function store() {
            console.log('now');
            console.log(form.photo)
            form.post(route('heroes.store'))
        }
        return {form, store};
    }
}
</script>

<style scoped>

</style>

