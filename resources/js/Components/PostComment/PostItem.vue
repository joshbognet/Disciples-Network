<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import moment from 'moment';
import Like from '@/Components/PostComment/Likes/Like.vue';
import Dislike from '@/Components/PostComment/Likes/Dislike.vue';
import PostForm from '@/Components/PostComment/PostForm.vue';
import CombinedComments from '@/Components/PostComment/CombinedComments.vue';
// defineProps({
//     post:Object,
//     user:Object,
//     username:Object,
// })

</script>
<template >
    <div class="shadow rounded-md border mt-5 px-5 py-1">
        <div class="flex justify-between items-center mt-5 py-3 space-x-5">
                <h2 class="flex items-end text-cyan-600 font-semibold text-xl text-gray-800 leading-tight">
                    <Link :href="route('profiles.show',post.user.username)">
                        <img class="h-8 w-8 rounded-full object-cover" :src="$props.post.user.profile_photo_url" :alt="post.user.username">
                    </Link>
                    <Link class="ml-2" :href="route('profiles.show', post.user.username)">{{ post.user.username }}</Link>
                </h2>
                <div class="relative">
                    <button type="button" class="focus:outline-none  text-gray-700" @click="openMenu = !openMenu">
                        <icon name="ellipsis-h" class="w-5 h-5 fill-current"></icon>
                    </button>
                    <div v-if="openMenu" class="bg-gray-300 text-sm absolute w-48
                     right-0 text-gray-700 shadow-lg rounded-md px-4
                     py-2 hover:bg-gray-700 hover:text-gray-300
                     transition duration-150 ease-in-out">
                        <form @submit.prevent="deletePost">
                            <button type="submit" class="flex justify-between items-center w-full focus:outline-none">
                                Delete Post
                                <icon name="trash" class="w-3 h-3 fill-current"></icon>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <div class="flex-1 ">
            <div>
                <p class="bg-slate-700 text-white rounded mt-3 px-4 py-3" >
                {{ post.body }}
                </p>
            </div>
            <div class="flex items-end my-3 ">
                <div :title="moment(post.created_at).startOf('hour').fromNow()" class="text-sm mb-1 text-cyan-600 comment-line">
                    {{moment(post.created_at).format('MMMM Do YYYY')}}
                </div>

                <div class="flex ml-3" >
                   <like :item="post" :method="submitLike"></like>
                   <dislike :item="post" :method="submitDislike" class="ml-2 "></dislike>
                </div>
            </div>
            <post-form :method="submit" :form="form" :text="'Comment'"></post-form>
            <CombinedComments :comments="post.comments" ></CombinedComments>
        </div>
    </div>
</template>
<script>
    export default {
            props: ['post','order'],
            components:{
                Like,
                Dislike,
                CombinedComments,
                PostForm,
            },
            data() {
                return {
                    openMenu:false,
                    form: this.$inertia.form({
                        body: this.body,
                        user_id: this.post.user_id,
                    }),
                    deleteForm: this.$inertia.form({
                        userPost: this.post
                    }),
                    likeForm: this.$inertia.form({
                        userPost: this.post
                    }),
                    dislikeForm: this.$inertia.form({
                        userPost: this.post
                    }),
                }
            },
            methods:{
                submit() {
                    this.form.post(this.route('comments.store', this.post), {
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
                deletePost() {
                    this.openMenu = false
                    this.deleteForm.delete(this.route('posts.destroy', this.post), {
                        preserveScroll: true,
                        onError: () => {
                            Toast.fire({
                                icon: 'error',
                                title: 'You do not have permission to delete this post!',
                            })
                        },
                        onSuccess:()=>{
                            Toast.fire({
                                icon: 'success',
                                title: 'Post has successfully been deleted!'
                            })
                        }
                    })
                },
                created: function () {
                    this.moment =moment().format('MMMM Do YYYY');
                },
                submitLike() {
                    this.likeForm.post(this.route('post-like.store', this.post), {
                        preserveScroll: true,
                        onSuccess:()=>{}
                    })
                },
                submitDislike() {
                    this.likeForm.delete(this.route('post-like.destroy', this.post), {
                        preserveScroll: true,
                        onSuccess:()=>{}
                    })
                },

            }

        }
</script>
