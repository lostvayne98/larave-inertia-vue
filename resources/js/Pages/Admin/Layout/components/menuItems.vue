<template>
    <li class="nav-item">
        <a href="#" class="nav-link">

            <Link class="nav-link" :href="route('users.index')" >

                <p>   Пользователи </p>

            </Link>

        </a>

    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">

            <Link class="nav-link" :href="route('heroes.index')" >

                <p>   Герои </p>

            </Link>

        </a>

    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">

            <Link class="nav-link" :href="route('skills.index')" >

                <p> Скиллы </p>

            </Link>

        </a>

    </li>


    <li class="nav-item">
        <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Widgets
                <span class="right badge badge-danger">New</span>
            </p>
        </a>
    </li>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    name: "menuItems",
    components:{
        Link
    }
}
</script>

<style scoped>

</style>
