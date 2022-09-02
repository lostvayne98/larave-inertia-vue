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
                    <tbody>
                    <tr>
                        <td>Герой</td>
                        <td>{{hero.name}}</td>

                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Факультет</td>
                        <td>{{hero.faculty}}</td>

                    </tr>
                    </tbody>

                    <tbody>
                    <tr>
                        <td>Курсы</td>
                        <td>{{hero.course}}</td>

                    </tr>
                    </tbody>

                    <tbody>
                    <tr>
                        <td>Звание</td>
                        <td>{{hero.rank}}</td>

                    </tr>
                    </tbody>


                    <tbody>
                    <tr>
                        <td>Биография</td>
                        <td>{{hero.bio}}</td>

                    </tr>
                    </tbody>


                    <tbody>
                    <tr>
                        <td>Квесты</td>
                        <td>{{hero.quests}}</td>

                    </tr>
                    </tbody>

                    <tbody>
                    <tr>
                        <td>
                            Хак скиллы
                        </td>
                        <td style="display:flex;">
                            <div >
                                <div v-for="hack in hackSkills " :key="hack.id" style="height: 100px">
                                    {{hack.name}}

                                </div>
                            </div>
                            <div style="margin-left: 50px">
                                <div v-for="amountHack in amountHacks" :key="amountHack.id" style="" >
                                    Кол:во    {{amountHack.amount}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>
                            Обычные скиллы
                        </td>
                        <td style="display:flex;">
                            <div >
                                <div v-for="combat in combatSkills " :key="combat.id" style="height: 100px">
                                    {{combat.name}}

                                </div>
                            </div>
                            <div style="margin-left: 50px">
                                <div v-for="amountCombat in amountCombats" :key="amountCombat.id">
                                    Кол:во    {{amountCombat.amount}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <tr>

                        <td>
                        <th>Жизни</th>


                        <th>
                            {{hero.life}}
                        </th>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <th>
                            Энергия
                        </th>
                        <th>{{hero.energy}}</th>
                        <th>

                        </th>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <th>

                            Firewall
                        </th>
                        <th>{{hero.firewall}}</th>
                        <td>

                        </td>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <table>
                    <tr>
                        <th>
                            Изменения
                        </th>
                        <td>
                            <div class="btn-group">
                                <Link :href="route('heroes.edit',hero.id)" class="btn btn-default">Изменить Героя</Link>
                                <Link :href="route('add.skills',hero.id)" class="btn btn-default">Добавить хак скилл</Link>
                            </div>
                        </td>
                    </tr>

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
