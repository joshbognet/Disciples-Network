<script setup>
import PagesLayout from '@/Layouts/PagesLayout.vue';
import UserBlock from '@/Components/UserBlock.vue';
import { Link } from '@inertiajs/inertia-vue3';
defineProps({
members:Array,
member:Array,

username:String,
});

</script>
<template >
    <PagesLayout title="Member">
        <template #title>
            <div class="flex flex-col items-center sm:flex-row sm:justify-between">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <Link :href="route('members.index')" class="capitalize text-gray-500 underline">
                        Members
                    </Link>
                </h2>
                <span class="text-gray-500 leading-tight text-lg capitalize mt-5 sm:mt-0">
                    Visit your
                    <Link href="#" class="underline hover:text-green-500">friends</Link>
                </span>
            </div>
        </template>
        <UserBlock :items="members" ></UserBlock>
    </PagesLayout>
</template>
