<script setup>
import Layout from '../Layout/Layout.vue';
import { Head } from '@inertiajs/vue3';
const props = defineProps({
    name: String,
    frameworks: Array
})

defineOptions({ layout: Layout })

</script>

<template>
    <Head>
        <Title>About</Title>
    </Head>
    <h1>About</h1>
    <div>
        <h2>{{ name }}</h2>
    </div>
    <h1>{{ frameworks }}</h1>
    <ul>
        <li v-for="(framework, index) in frameworks" :key="index">{{ framework }}</li>
    </ul>
</template>
<style ></style>