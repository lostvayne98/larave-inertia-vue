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
            <div v-if="user.hero_id != null">
            <tr >
                <th>
                    Герой
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>
                <tr>
                <th>
                    Факультет
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>

            <tr>
                <th>
                    Курсы
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>

            <tr>
                <th>
                    Звание
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>

            <tr>
                <th>
                    Биография
                </th>

                <td>
                    {{hero.name}}
                </td>
            </tr>

            <tr>

                <th>
                    Квесты
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>

            <tr>
                <th>
                    Хак Скиллы
                </th>
                <td>
                    {{hero.name}}
                </td>

            </tr>
                <th>
                    Обычные скиллы
                </th>
                <td>
                    {{hero.name}}
                </td>
            <tr>

                <th>
                    Жизни
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>
            <tr>

                <th>
                    Энергия
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>
            <tr>

                <th>

                    Firewall
                </th>
                <td>
                    {{hero.name}}
                </td>
            </tr>
            </div>
            <tr>
<th>
Изменения
</th>
<td>
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
    props:{
        user:Object,
        title:String,
        hero:Object
    }
}
</script>
