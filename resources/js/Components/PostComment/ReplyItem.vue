<script setup>
    import {Link} from '@inertiajs/inertia-vue3';
    import moment from 'moment';
</script>
<template>
    <div class="flex  border-gray-400 mt-5 mb-1/2 pt-3  space-x-5">
        <div class="flex-shrink-0">
            <Link :href="route('profiles.show', reply.user.username)">
                <img class="h-8 w-8 rounded-full object-cover" :src="reply.user.profile_photo_url" :alt="reply.user.username">
            </Link>
        </div>

        <div class="flex-1">
            <div>
                <h2 class="flex items-end text-cyan-600 font-semibold text-lg text-gray-800 leading-tight">
                    <Link :href="route('profiles.show', reply.user.username)">{{ reply.user.username }}</Link>
                    </h2>
                <p class="bg-slate-600 text-white rounded mt-3 px-3 py-2">
                    {{ reply.body }}
                </p>
            </div>
            <div class="flex items-end my-3 ">
                <div :title="moment(reply.created_at).startOf('hour').fromNow()" class="text-sm mb-1 text-cyan-600 comment-line">
                    <span > {{moment(reply.created_at).format('MMMM Do YYYY')}}</span>
                </div>
                <div class="flex ml-3">
                    <!-- <like :item="comment" :method="submitLike"></like>
                    <dislike :item="comment" :method="submitDislike" class="ml-2"></dislike> -->
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3';
    // import moment from 'moment';
    // import CombinedReplies from '@/Components/PostComment/CombinedReplies.vue';
    // import PostForm from '@/Components/PostComment/PostForm.vue';
export default {
    props:['reply']

}
</script>
