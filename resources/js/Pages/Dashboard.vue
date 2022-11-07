<script setup>

import PagesLayout from '@/Layouts/PagesLayout.vue';
import CombinedPosts from '@/Components/PostComment/CombinedPosts.vue';
import SuggestionBlock from '@/Components/SuggestionBlock.vue';
import PostForm from '@/Components/PostComment/PostForm.vue';

</script>

<template>
    <PagesLayout  title="Dashboard">
        <template #title>

                <div class="flex  justify-between items-center w-full">
                    <h2 class="flex items-end font-semibold text-xl text-slate-700 leading-tight">
                        <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.username" class="h-20 w-20 rounded-full object-cover">
                        <span class="capitalize ml-3 mb-5">Dashboard</span>

                    </h2>
                </div>




            

        </template>
        <PostForm :method="submit" :form="form" :text="'post'"></PostForm>
       <SuggestionBlock :suggestions="suggestions"></SuggestionBlock>
       <CombinedPosts :posts="combinedPosts.data"></CombinedPosts>
    </PagesLayout>
</template>
<script>
    export default {
        props:['combinedPosts', 'suggestions'],
        components: {
            CombinedPosts,
            PagesLayout,
            PostForm,
            SuggestionBlock
        },
        data() {
            return {
                form: this.$inertia.form({
                    user_id: this.$page.props.user.id,
                    body: this.body
                }),
                // allPosts: this.combinedPosts
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('posts.store'), {
                    preserveScroll: true,
                    onSuccess:()=> {
                        Toast.fire({
                            icon: 'success',
                            title: 'Your post has successfully been published!',
                        }),
                        this.form.body = null
                    }
                })
            },
            // loadMorePosts() {
            //     if (!this.allPosts.next_page_url) {
            //         return
            //     }
            //     return axios.get(this.allPosts.next_page_url)
            //         .then(resp => {
            //             this.allPosts = {
            //                 ...resp.data,
            //                 data: [
            //                     ...this.allPosts.data, ...resp.data.data
            //                 ]
            //             }
            //         })
            // }
        }
    }
</script>
