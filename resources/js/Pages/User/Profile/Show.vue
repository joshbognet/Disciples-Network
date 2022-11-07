<script setup>
import PagesLayout from '@/Layouts/PagesLayout.vue';
import Status from '@/Components/FriendStatus/Status.vue';
   defineProps({
    profile:Object,
    Status:String,
});
</script>

<template >
    <PagesLayout title="Profile">
        <template #title>
            <div class="flex justify-between items-center  w-full">
                <h2 class="flex items-end font-semibold text-xl text-gray-800 leading-tight">
                    <img :src="$page.props.profile.profile_photo_url" :alt="$page.props.profile.username" class="h-20 w-20 rounded-full object-cover">

                    <span class="capitalize   ml-3 mb-5" >{{ `${profile.username}'s Profile` }}</span>

                </h2>
                <Status :profile="profile" :isFriendsWith="isFriendsWith" :friendRequestSentTo="friendRequestSentTo" :friendRequestRecievedFrom="friendRequestRecievedFrom"></Status>
            </div>
        </template>

    </PagesLayout>
</template>

<script>
     export default {
        props:['profile', 'isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom'],
        components:{
            PagesLayout,
            Status

        }

    }
</script>
