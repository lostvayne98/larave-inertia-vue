<template>
    <div>
        <table class="table">
            <!-- Display the paginated data here -->
        </table>
        <nav>
            <ul class="pagination">
                <li class="page-item" v-if="pagination.prev_page_url">
                    <InertiaLink class="page-link" :href="pagination.prev_page_url" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </InertiaLink>
                </li>
                <li class="page-item" v-for="page in pages" :key="page" :class="{ active: page == pagination.current_page }">
                    <InertiaLink class="page-link" :href="this.route + '/?page=' + page">{{ page }}</InertiaLink>
                </li>
                <li class="page-item" v-if="pagination.next_page_url">
                    <InertiaLink class="page-link" :href="pagination.next_page_url" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </InertiaLink>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import { ref, watchEffect, computed } from 'vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';
export default {
    props: {
        links: Object,
        route:String
    },
    setup(props) {
        const pagination = ref(props.links);

        watchEffect(() => {
            pagination.value = props.links;
        });

        const pages = computed(() => {
            if (!pagination.value.to) {
                return [];
            }

            const from = Math.max(1, pagination.value.current_page - 2);
            const to = Math.min(from + 4, pagination.value.last_page);

            const pages = [];
            for (let page = from; page <= to; page++) {
                pages.push(page);
            }

            return pages;
        });

        return {
            pagination,
            pages,
        };
    },
    components:{
       InertiaLink
    },

};
</script>
