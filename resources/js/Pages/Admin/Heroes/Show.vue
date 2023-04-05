<template>

    <Layout>
        <section class="w-100 p-4" style="background-color: #eee; border-radius: .5rem .5rem 0 0;">


            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                 alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ hero.name }}</h5>

                            <div class="d-flex justify-content-center mb-2">
                                <Link :href="route('heroes.edit',hero.id)" class="btn btn-outline-primary ms-1">
                                    Редактировать
                                </Link>
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
                                    <p class="text-muted mb-0">{{ hero.name }}</p>
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
                    <h4 v-if="hero.user">
                        <Link :href="route('users.show',hero.user.id)">Герой</Link>
                    </h4>
                    <div class="row" v-if="hero.user">
                        <div class="card mb-4" style="width: 100%">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"> Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Биография</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.bio }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Курс</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.course }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Квест</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.quests }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Жизни</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.life }}
                                            <i @click="increment('life')" class="fa fa-plus" style="float: right;"
                                               aria-hidden="true"></i>
                                            <i @click="decrement('life')" class="fa fa-minus"
                                               style="float: right; margin-right: 10px;" aria-hidden="true"></i>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Энергия</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.energy }}
                                            <i @click="increment('energy')" class="fa fa-plus" style="float: right;"
                                               aria-hidden="true"></i>
                                            <i @click="decrement('energy')" class="fa fa-minus"
                                               style="float: right; margin-right: 10px;" aria-hidden="true"></i>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Firewall</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ hero.firewall }}
                                            <i @click="increment('firewall')" class="fa fa-plus" style="float: right;"
                                               aria-hidden="true"></i>
                                            <i @click="decrement('firewall')" class="fa fa-minus"
                                               style="float: right; margin-right: 10px;" aria-hidden="true"></i>

                                        </p>
                                    </div>
                                </div>
                                <hr>

                                <div class="card-body" style="padding-left: 0px;padding-right: 0px;" v-for="skill in hero.skills" :key="skill.id">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">{{ skill.skill.name }}</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"> {{skill.amount}}
                                                <i @click="increment('skill',skill.id)" class="fa fa-plus" style="float: right;"
                                                   aria-hidden="true"></i>
                                                <i @click="decrement('skill',skill.id)" class="fa fa-minus"
                                                   style="float: right; margin-right: 10px;" aria-hidden="true"></i>
                                            </p>

                                        </div>
                                    </div>

                                    <hr>



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
    props: {
        hero: Object
    },
    components: {
        Layout,
        Link
    },
    methods: {
        increment(name,skill_id = null) {
            this.$inertia.post(route('increment', this.hero.id), {
                increment: name,
                skill_id: skill_id
            })
        },
        decrement(name,skill_id = null) {
            this.$inertia.post(route('decrement', this.hero.id), {
                decrement: name,
                skill_id: skill_id
            })
        }
    },
    created() {
        console.log(this.hero)
    }


}
</script>

<style scoped>

</style>
