<script setup>
import Layout from '../../Layout/layout.vue';
import { Link, Head } from '@inertiajs/vue3';
import { watch, ref } from 'vue'
import { router } from "@inertiajs/vue3";  // use router

const props = defineProps({
    users: Object,
    filters: Object
})
defineOptions({ layout: Layout })

let search = ref(props.filters.search)

watch(search, value => {
    // console.log(value)
    router.get('/users', { search: value }, {
        preserveState: true,
        replace: true
    })
})

</script>

<template>
    <section class="px-6">

        <Head>
            <Title>Users</Title>
        </Head>
        <div class="flex justify-between my-6">
            <h1 class="text-3xl">Users</h1>
            <input v-model="search" type="text" placeholder="Search..." class="border px-3 rounded-lg">
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users.data" :key="user.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ user.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ user.email }}
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            <a :href="'/user/' + user.id">Edit</a>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-4 bg-blue-600">
            <Link v-for="(link, index) in users.links" :key="index" :href="link.url" v-html="link.label" />
        </div>
    </section>
</template>
<style></style>