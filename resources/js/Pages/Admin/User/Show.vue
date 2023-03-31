<template>

<Layout>
        <section class="w-100 p-4" style="background-color: #eee; border-radius: .5rem .5rem 0 0;">



            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ user.name }}</h5>

                            <div class="d-flex justify-content-center mb-2">
                                <Link :href="route('users.edit',user.id)" class="btn btn-outline-primary ms-1">Редактировать</Link>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{user.name}}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(097) 234-5678</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <h4 v-if="user.hero"><Link :href="route('heroes.read',user.hero.id)">Герой</Link></h4>
                    <div class="row" v-if="user.hero">
                        <div class="card mb-4" style="width: 100%">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Биография</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.bio}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Курс</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.course}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Квест</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.quests}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Жизни</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.life}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Энергия</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.energy}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Firewall</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{user.hero.firewall}}</p>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </Layout>
</template>

<script>
import Layout from "../Layout/Layout.vue";
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "Show",
    props:{
        user:Object
    },
    components: {
        Layout,
        Link
    },
    created() {
        console.log(this.user)
    }


}
</script>

<style scoped>

</style>
