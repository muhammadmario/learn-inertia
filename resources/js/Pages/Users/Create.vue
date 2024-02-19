<script setup>
import Layout from '../../Layout/layout.vue';
import { reactive } from 'vue'
import { router } from "@inertiajs/vue3";  // use router

defineOptions({ layout: Layout })

let form = reactive(
    {
        name: '',
        email: '',
        password: ''
    }
)

const submit = () => {
    router.post('/users', form)
}

</script>

<template>
    <section class="px-6">
        <h1>Create Users</h1>

        <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
            <div class="mb-6">
                <label for="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Name
                </label>
                <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full" required name="name"
                    id="name">
                <div v-if="$page.props.errors.name" class="text-red">{{ $page.props.errors.name }}</div>
            </div>
            <div class="mb-6">
                <label for="block mb-2 uppercase font-bold text-xs text-gray-700">
                    email
                </label>
                <input v-model="form.email" type="email" class="border border-gray-400 p-2 w-full" required name="email"
                    id="email">
            </div>
            <div class="mb-6">
                <label for="block mb-2 uppercase font-bold text-xs text-gray-700">
                    password
                </label>
                <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full" required
                    name="password" id="password">
            </div>

            <div class="mb-6">
                <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
            </div>
        </form>
    </section>
</template>