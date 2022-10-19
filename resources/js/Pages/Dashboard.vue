<script setup>
import PagesLayout from '@/Layouts/PagesLayout.vue';
defineProps({
    

});
</script>

<template>
    <PagesLayout title="Dashboard">
        <template #title>
            <div class="flex justify-between items-center w-full">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.username" class="h-20 w-20 rounded-full object-cover">
                    <span class="capitalize ml-3 mb-5">Dashboard</span>
                </h2>
            </div>
        </template>
    </PagesLayout>
</template>
