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
                        <label > Скиллы</label>
                        <div  v-for="(hacks, index) in hack" class="card-body">
                            <label>Хак скилл: {{ index }}
                                <select v-model="form.HackSkills[index]" type="text"  class="form-control">
                                    <option selected disabled class="">Выберите скилл</option>
                                    <option v-for="hackSkill in hackSkills" :key="hackSkill.id" :value="hackSkill.id"> {{hackSkill.name}}</option>
                                </select>
                            </label>
                        </div>
                        <div  v-for="(guest, index) in guests" class="card-body">
                            <label>Обычный скилл: {{ index }}
                                <select v-model="form.CombatSkills[index]" type="text"  class="form-control">
                                    <option selected disabled class="">Выберите скилл</option>
                                    <option v-for="combatSkill in combatSkills" :key="combatSkill.id" :value="combatSkill.id"> {{combatSkill.name}}</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <i class="fa fa-plus-circle" aria-hidden="true" @click="addInput()">Обычный скилл</i>
                    <i class="fa fa-plus-circle" aria-hidden="true" @click="addHack()">Хак скилл</i>
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
        title:String,
        hero:String
    },
    data(){
        return {
            file: '',
            guests: [],
            hack: []
        }
    },
    methods: {
       addInput() {
            console.log('s');
            this.guests.push('New guest');
        },
        addHack () {
            console.log('q');
            this.hack.push('New guest');
        },
    },
    setup(props){
        const form = useForm(   {
            HackSkills: [],
            CombatSkills:[],
            id:props.hero
        });

        function store() {
            form.post(route('submit.add.skills', props.hero))
        }
        return {form, store};
    }
}
</script>

<style scoped>

</style>

