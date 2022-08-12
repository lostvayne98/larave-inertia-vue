<template>
    <div class="content-wrapper " style="margin-left:235px">
        <section class="content-header" >
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{title}}</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <p>Общая информация</p>
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item">

                            </li>
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            id
                        </th>
                        <td>
                            {{hero.id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Фотография
                        </th>
                        <td>
                            <img  style="width:50px;height:50px" :src="`/storage/${hero.photo}`">
                        </td>
                    </tr>
                    <th>
                        Имя
                    </th>
                    <td>
                        {{hero.name}}
                    </td>
                    <tr>
                        <th>
                            Курс
                        </th>
                        <td>
                            {{hero.course}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Звание
                        </th>
                        <td>
                            {{hero.rank}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Биография
                        </th>
                        <td>
                            {{hero.bio}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Квесты
                        </th>
                        <td>
                            {{hero.quests}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Хак скилл
                        </th>
                        <td v-for="hackSkill in hackSkills" :key="hackSkill.id">
                            {{hackSkill.name}}
                        <th>
                            Кол-во
                        </th>
                        <th v-for="hack in hackAmount" :key="hack.id">
                            {{hack.amount}}
                        </th>

                        </td>

                    </tr>
                    <tr>
                        <th>
                            Обычные скиллы
                        </th>
                        <td v-for="combatSkill in combatSkills">
                            {{combatSkill.name}}
                        <th>
                            Кол-во
                        </th>
                        <th v-for="combat in combatAmount">
                            {{combat.amount}}
                        </th>

                        </td>

                    </tr>
                    <tr>
                        <th>
                            Жизни
                        </th>
                        <td>
                            {{hero.life}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Энергия
                        </th>
                        <td>
                            {{hero.energy}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Firewall
                        </th>
                        <td>
                            {{hero.firewall}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Изменения
                        </th>
                        <td>
                            <div class="btn-group">
                                <Link :href="route('heroes.edit',hero.id)" class="btn btn-default">Изменить Героя</Link>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components:{
        Link
    },
    props:{
        hero:Object,
        title:String,
        combatSkills:Array,
        hackSkills:Array,
        hackAmount:Array,
        combatAmount:Array
    }
}
</script>
