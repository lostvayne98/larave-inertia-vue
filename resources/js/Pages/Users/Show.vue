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
                                <button class="btn " style="margin-left:850px;" @click="incrementAmountHack(amountHack.id)">Добавить</button>
                                <button class="btn " style="margin-left:916px;" @click="decrementAmountHack(amountHack.id)">Понизить</button>
                                <button class="btn btn-danger " style="margin-left:916px;" @click="destroyHeroHack(amountHack.id)">Удалить</button>
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
                                <button class="btn " style="margin-left:850px;" @click="incrementAmountCombat(amountCombat.id)">Добавить</button>
                                <button class="btn " style="margin-left:916px;" @click="decrementAmountCombat(amountCombat.id)">Понизить</button>
                                <button class="btn btn-danger " style="margin-left:916px;" @click="destroyHeroCombat(amountCombat.id)">Удалить</button>
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
                <th>
                    <button class="btn " style="margin-left:850px;" @click="incrementLife(hero.id)">Добавить</button>
                    <button class="btn " style="margin-left:850px;" @click="decrementLife(hero.id)">Понизить</button>
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

                    <button class="btn " style="margin-left:850px;" @click="incrementEnergy(hero.id)">Добавить</button>
                    <button class="btn " style="margin-left:850px;" @click="decrementEnergy(hero.id)">Понизить</button>
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

                    <button class="btn " style="margin-left:850px;" @click="incrementFireWall(hero.id)">Добавить</button>
                    <button class="btn " style="margin-left:850px;" @click="decrementFireWall(hero.id)">Понизить</button>
                </td>
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
import {Link} from '@inertiajs/inertia-vue3';
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
             incrementAmountCombat(id){


                this.$inertia.post(this.route('increment.amountCombat',id))

    },
             decrementAmountCombat(id){

            this.$inertia.post(this.route('decrement.amountCombat',id))
        },

             incrementAmountHack(id){


            this.$inertia.post((this.route('increment.amountHack',id)))
        },

            decrementAmountHack(id){


            this.$inertia.post(this.route('decrement.amountHack',id))
        },
        incrementLife (id) {
                 this.$inertia.post(this.route('increment.life',id))
        },
        decrementLife (id) {
            this.$inertia.post(this.route('decrement.life',id))
        },
        incrementEnergy (id) {
            this.$inertia.post(this.route('increment.energy',id))
        }, decrementEnergy (id) {
            this.$inertia.post(this.route('decrement.energy',id))
        },
        incrementFireWall (id) {
            this.$inertia.post(this.route('increment.firewall',id))
        },
        decrementFireWall (id) {
            this.$inertia.post(this.route('decrement.firewall',id))
        },
        destroyHeroHack (id) {
            if(confirm('Вы Уверены,что хотите удалить скилл героя?')) {
                this.$inertia.post(this.route('destroy.hero.hack', id))
            }
        },
        destroyHeroCombat (id) {
            if(confirm('Вы Уверены,что хотите удалить скилл героя?')) {
                this.$inertia.post(this.route('destroy.hero.combat', id))
            }
        }
    }



}
</script>
