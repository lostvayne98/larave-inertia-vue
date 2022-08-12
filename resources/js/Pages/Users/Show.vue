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
               {{user.id}}
           </td>
            </tr>
            <th>
                Имя
            </th>
            <td>
                {{user.name}}
            </td>
            <tr>
            <th>
                Пароль
            </th>
            <td>
                {{user.password_admin}}
            </td>
            </tr>
            </tbody>
        </table>
            <table class="table table-bordered table-striped"  v-if="user.hero_id != null">
                <tbody>
            <tr >
                <th>
                    Герой
                </th>
                <td style="width: 907px;">
                    {{hero.name}}
                </td>
            </tr>
                <tr>
                <th>
                    Факультет
                </th>
                <td>
                    {{hero.faculty}}
                </td>
            </tr>

            <tr>
                <th>
                    Курсы
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
                <th v-for="hack in amountHacks" :key="hack.id">
                    {{hack.amount}}
                </th>

                </td>

            </tr>
                <th>
                    Обычные скиллы
                </th>
                <td>
                    {{hero.combat_skills}}
                 <th>
                Кол-во
                </th>

                 <th v-for="combat in amountCombats" :key="combat.id" >
                     {{combat.amount}}
                     <button  class="btn btn-success" @click="updateAmountCombat(combat.id)"> Добавить</button>
                 </th>
                </td>
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

                </tbody>
            </table>
        <table>
            <tbody class="table table-bordered table-striped">
            <tr>
<th>
Изменения
</th>
<td    style="width: 907px;" >
    <div class="btn-group">
        <Link :href="route('users.edit',user.id)" class="btn btn-default">Изменить пользователя</Link>
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
import {Link, useForm} from '@inertiajs/inertia-vue3';
export default {
    components:{
        Link
    },
    data(){
        return {
            com: ''
        }
    },
    props:{
        user:Object,
        title:String,
        hero:Object,
        combatSkills:Array,
        hackSkills:Array,
        amountHacks:Array,
        amountCombats:Array
    },


    methods:{
        updateAmountCombat(id){


                this.$inertia.post(this.route('update.amountCombat',id))

        }
    }



}
</script>
