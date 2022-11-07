<script setup>
    import GreenButton from '@/Components/Buttons/GreenButton.vue';
    import { FulfillingSquareSpinner } from 'epic-spinners';
</script>
<template>
    <form @submit.prevent="acceptFriend">
        <green-button type="submit" >

            <fulfilling-square-spinner
                    :animation-duration="4000"
                    :size="20"
                    class="text-white"
                    v-if="loading"
                />
            <template v-else>
                Accept
                <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
            </template>
        </green-button>
    </form>
</template>
<script>
export default {
    props: ['profile'],
    components: {
        FulfillingSquareSpinner,
        GreenButton,
    },
    data() {
            return {
                acceptFriendForm: this.$inertia.form({
                    user: this.profile
                }),
                loading: false
            }
        },
        methods: {
            acceptFriend() {
                this.loading = true
                this.acceptFriendForm.put(this.route('friends.update', this.profile.id), {
                    preserveScroll: true,
                    onSuccess:()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Successfully accepted request!'
                        })
                        this.loading = false
                    }
                })
            }
        }
}

</script>
