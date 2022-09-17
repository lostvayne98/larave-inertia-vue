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
                            {{admin.id}}
                        </td>
                    </tr>
                    <th>
                        Имя
                    </th>
                    <td>
                        {{admin.name}}
                    </td>
                    <tr>
                        <th>
                            Пароль
                        </th>
                        <td>
                            {{admin.password_admin}}
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
                                <Link :href="route('admins.edit',admin.id)" class="btn btn-default">Изменить пользователя</Link>
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
        admin:Object,
        title:String,
    }



}
</script>
