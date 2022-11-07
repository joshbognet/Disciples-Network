<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>
<template>

    <div class=" shadow-md px-3 flex flex-col">
        <h3 class="font-semibold text-lg text-gray-800 leading-tight mt-5">Friend Suggestions:</h3>
        <div class=" flex items-center justify-center sm:flex-row flex-col mb-10 pb-5">
            <div v-for="user in suggestions" :key="user.id" class=" transform transition duration-500 hover:scale-125 w-1/3 ">
                <Link :href="route('profiles.show', user.username)" class=" sm:w-1/5">
                    <div class="group flex flex-col text-xs hover:text-lg items-center px-2 py-5 border-gray-400 text-cyan-700 mt-5 hover:text-gray-800 hover:shadow-xl m-2 opacity-100 hover:rounded-md shadow " >
                        <img class="h-20 w-20 lg:h-40 lg:w-40  object-cover " :src="user.profile_photo_url" :alt="user.username" :title="user.username" />
                        <span class="mt-1 opacity-0 group-hover:opacity-100 duration-300 absolute inset-x-0 bottom-0 flex justify-center items-end text-xl -mb-5 text-cyan-600 font-semibold" :alt="user.username" :title="user.username" >{{user.username}}</span>
                   </div>
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['suggestions']
    }
</script>
