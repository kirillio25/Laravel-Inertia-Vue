<script setup>
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import debounce from 'lodash/debounce'


const props =defineProps({
    users: Object,
    searchTerm: String,
    can: Object,

});

const search = ref(props.searchTerm);

watch(
    search,
    debounce((q) => {
        router.get('/', { search: q }, { preserveState: true })
    }, 500)
)

//Format date
const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>
    <Head title="Home"/>

    <div class="container mt-4">
        <h2 class="mb-3 fw-semibold">Users List</h2>

        <div class="table-responsive">

            <div>
                <input type="search" placeholder="Search" v-model="search">
            </div>

            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-light">
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th v-if="can.delete_user">Удаление</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="user in users.data" :key="user.id">
                    <td>
                        <img
                            :src="user.avatar ? ('storage/' + user.avatar) :
                            'https://cdn-icons-png.flaticon.com/512/149/149071.png'"
                            alt="User avatar"
                            class="img-fluid rounded-circle border"
                            width="50"
                            height="50"
                        >
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ getDate(user.created_at) }}</td>
                    <td v-if="can.delete_user"><button>удалить</button></td>
                </tr>
                </tbody>
            </table>

            <div v-if="users && users.links">
                <Link
                    v-for="link in users.links"
                    :key="link.label"
                    :href="link.url ?? '#'"
                    v-html="link.label"
                    class="btn btn-outline-primary btn-sm"
                    :class="{ active: link.active, disabled: !link.url }"
                ></Link>

                <p>
                    Showing {{ users.from }} to {{ users.to }} of {{ users.total }} results
                </p>
            </div>


        </div>
    </div>
</template>

