<script setup>
    import {Link} from '@inertiajs/inertia-vue3';
    import moment from 'moment';
    import CombinedReplies from '@/Components/PostComment/CombinedReplies.vue';
    import PostForm from '@/Components/PostComment/PostForm.vue';
    import Like from '@/Components/PostComment/Likes/Like.vue';
    import Dislike from '@/Components/PostComment/Likes/Dislike.vue';
</script>
<template>
    <div class="flex border-t border-gray-400 mt-5 py-5 space-x-5">
        <div class="flex-shrink-0">
            <Link :href="route('profiles.show', comment.user.username)">
                <img class="h-8 w-8 rounded-full object-cover" :src="comment.user.profile_photo_url" :alt="comment.user.username">
            </Link>
        </div>

        <div class="flex-1">
            <div>
                <h2 class="flex items-end text-cyan-600 font-semibold text-lg text-gray-800 leading-tight">
                    <Link :href="route('profiles.show', comment.user.username)">{{ comment.user.username }}</Link>
                    </h2>
                <p class="bg-slate-700 text-white rounded mt-3 px-3 py-2">
                    {{ comment.body }}
                </p>
            </div>
            <div class="flex items-end my-3">
                <div :title="moment(comment.created_at).startOf('hour').fromNow()" class="text-sm mb-1 text-cyan-600 comment-line">
                    <span > {{moment(comment.created_at).format('MMMM Do YYYY')}}</span>
                </div>
                <div class="flex ml-3">

                    <like :item="comment" :method="submitLike"></like>
                    <dislike :item="comment" :method="submitDislike" class="ml-2"></dislike>
                </div>
            </div>
            <div class="w-full ">
                <CombinedReplies :replies="comment.replies"></CombinedReplies>
            </div>
            <div class="w-full ">
                <post-form :method="submit" :form="form" :text="'Reply'" class="pl-20"></post-form>
            </div>
        </div>
    </div>
</template>

<script>


    export default {
        props: ['comment'],
        components: {
            Dislike,
            Like,
            CombinedReplies,
            PostForm
        },
         data() {
            return {
                form: this.$inertia.form({
                    body: this.body,
                    user_id: this.comment.user_id,
                }),
        //         likeForm: this.$inertia.form({
        //             comment: this.comment
        //         }),
        //         dislikeForm: this.$inertia.form({
        //             comment: this.comment
        //         }),
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('replies.store', this.comment), {
                    preserveScroll: true,
                    onSuccess:()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Your comment has successfully been published!'
                        })
                        this.form.body = null
                    }
                })
            },
        //     submitLike() {
        //         this.likeForm.post(this.route('comment-like.store', this.comment.id), {
        //             preserveScroll: true,
        //             onSuccess:()=>{}
        //         })
        //     },
        //     submitDislike() {
        //         this.dislikeForm.delete(this.route('comment-like.destroy', this.comment.id), {
        //             preserveScroll: true,
        //             onSuccess:()=>{}
        //         })
        //     },
         }
    }
</script>
