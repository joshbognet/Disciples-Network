<script setup>
import { Link } from '@inertiajs/inertia-vue3';
    defineProps({
    item:Array,
    items:Array,
});
</script>
<template>
    <div class=" sm:flex-wrap sm:flex">
        <Link :href="route('profiles.show', item.username)" class="sm:w-1/2" v-for="(item, index) in items" :key="index">
            <div class="ml-10 transform  transition duration-500 hover:scale-125  hover:shadow-lg flex items-center px-2 py-3 text-cyan-600 border-gray-500 mt-5 hover:text-gray-800 mr-10 ">
                <div class="flex flex-shrink-0">
                    <img :src="item.profile_photo_url" :alt="item.username" class="h-20 w-20 shadow-lg rounded-full object-cover">
                </div>
                <div class="flex flex-grow over-flow-hidden">
                    <span class=" text-lg ml-3" :alt="item.username" :title="item.username" >{{item.username}}</span>
                </div>
            </div>
        </Link>
    </div>
</template>
<!-- <script>
    export default {
        props: ['items']
    }
</script> -->
