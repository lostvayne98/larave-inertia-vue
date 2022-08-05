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
                            <li class="breadcrumb-item"><Link :href="route('combat_skills.create')">Создать Скилл</Link>
                            </li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->


        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Редкость</th>

                    </thead>
                    <tbody  v-for="Skill in combatSkills" :key="Skill.id">

                    <td>
                        {{Skill.id}}
                    </td>

                    <td>
                        {{Skill.name }}
                    </td>
                    <td>
                        {{Skill.rarity}}
                    </td>


                    <td>
                        <div class="btn-group">
                            <Link :href="route('combat_skills.edit',Skill.id)" class="btn btn-default">
                                Редактировать</Link>

                        </div>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn-danger" @click="destroy(Skill.id)">Удалить</button>
                        </div>
                    </td>

                    </tbody>
                </table>
<!--                <div v-if="users <15">
                    <Pagination :links="users.links"/>
                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from "../../Layout/Pagination";
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components:{ Link , Pagination},
    props: {
        title: String,
        combatSkills: Array
    },
    methods:{
        destroy(id){

            if(confirm('Вы Уверены,что хотите удалить Скилл?')){
                this.$inertia.delete(this.route('combat_skills.destroy',id))
            }
        }
    }

}
</script>

<style scoped>

</style>
