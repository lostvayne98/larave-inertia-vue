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
                        <label >Хак скиллы</label>
                        <select v-model="form.hackSkills" type="text"  class="form-control" name="hackSkills" >

                            <option v-for="HackSkill in hackSkills" :key="HackSkill.id ">{{HackSkill.name}}</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <label >Обычные скиллы</label>
                        <select v-model="form.combatSkills" type="text"  class="form-control">
                            <option v-for="combatSkill in combatSkills" :key="combatSkill.id"> {{combatSkill.name}}</option>
                        </select>
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
    props:{
        hackSkills:Array,
        combatSkills: Array,
        title:String,
        hero:Object
    },
    components:{
        Link
    },
    setup(props){
        const form = useForm(   {
            name: props.hero.name,
            faculty: props.hero.faculty,
            course:props.hero.course,
            rank:props.hero.rank,
            bio:props.hero.rank,
            quests:props.hero.quests,
            hackSkills: null,
            combatSkills:null,
            photo:props.hero.photo

        });

        function update() {
            form.put(route('heroes.update',props.hero.id))
        }
        return {form, update};
    }
}
</script>

<style scoped>

</style>

