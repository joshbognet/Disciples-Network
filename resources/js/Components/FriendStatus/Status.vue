<script setup>
import { FulfillingSquareSpinner } from 'epic-spinners';
 import BlueButton from '@/Components/Buttons/BlueButton.vue';
 import DangerButton from '@/Components/DangerButton.vue';
 import Accept from './Accept.vue';
 import Ignore from './Ignore.vue';

    defineProps({

profile:Object,
user:Object,
friendRequestRecievedFrom:Object,
});
</script>
<template>
  <div class="flex mt-5 sm:mt-0">
    <template v-if="$page.props.friendRequestRecievedFrom">
        <accept :profile="profile"></accept>
        <ignore :profile="profile" class="ml-3"></ignore>
    </template>

    <template v-else-if="$page.props.friendRequestSentTo">
        <h3 class="font-semibold border p-4 bg-yellow-400 rounded text-md text-gray-800 leading-tight">
            Pending...
        </h3>
    </template>
    <template v-else-if="$page.props.isFriendsWith">
        <form @submit.prevent="deleteFriend">
            <DangerButton type="submit">
                <fulfilling-square-spinner
                :animation-duration="4000"
                :size="20"
                class="text-white"
                v-if="loading"
            />
            <template v-else>
                Unfriend
                <icon name="user-minus" class="w-4 h-4 fill-current ml-1"></icon>
            </template>

            </DangerButton>
        </form>
    </template>
    <template v-else-if="$page.props.user.id != profile.id">
        <form @submit.prevent="addFriend" >
            <blue-button type="submit" class=" ">
                <fulfilling-square-spinner
                    :animation-duration="4000"
                    :size="20"
                    class="text-white"
                    v-if="loading"
                />
                <template v-else>
                    Add Friend
                <icon name="user-plus" class="w-4 h-4 fill-current ml-1"></icon>
                </template>

            </blue-button>
        </form>
    </template>
  </div>
</template>

<script>
    export default {
        props: ['profile','isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom'],
        components: {
            Accept,
            BlueButton,
            Ignore,
            FulfillingSquareSpinner,
            DangerButton,
        },
        data() {
            return {
                addFriendForm: this.$inertia.form({
                    user: this.profile
                }),
                deleteFriendForm: this.$inertia.form({
                    user: this.profile
                }),
                loading: false,
            }
        },
        methods: {
            addFriend() {
                this.loading = true
                this.addFriendForm.post(this.route('friends.store', this.profile.id), {
                    preserveScroll: true,
                    onSuccess: ()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend Request sent!'
                        })
                        this.loading = false
                    },
                })
            },
            deleteFriend() {
                this.loading = true
                this.deleteFriendForm.delete(this.route('friends.destroy', this.profile.id), {
                    preserveScroll: true,
                    onSuccess: ()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend has been removed!'
                        })
                        this.loading = false
                    },
                })
            },
        }
    }
</script>
