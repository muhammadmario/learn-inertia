<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <nav class="w-full bg-red-500 flex justify-between items-center px-6 py-6">
        <div class="flex flex-col">
            <h1 class="text-2xl font-bold">MyApp</h1>
            <p>Hello {{ $page.props.auth.user.username }}</p>
        </div>
        <ul class="flex gap-3">
            <li>
                <Link class="links" :class="{ 'font-bold': $page.url === '/' }" href="/">Home</Link>
            </li>
            <li>
                <Link class="links" :class="{ 'font-bold': $page.url === '/about' }" href='/about'>About</Link>
            </li>
            <li>
                <Link class="links" :class="{ 'font-bold': $page.url === '/users' }" href='/users'>Users</Link>
            </li>
            <li>
                <Link class="links" href='/logout' method="post" as="button">logout</Link>
            </li>
        </ul>
    </nav>
</template>


<style></style>
