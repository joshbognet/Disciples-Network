<script setup>
    import DangerButton from '@/Components/DangerButton.vue';
    import { FulfillingSquareSpinner } from 'epic-spinners';


</script>
<template>
    <form @submit.prevent="ignoreRequest">
        <DangerButton type="submit" class="">
            <fulfilling-square-spinner
            :animation-duration="4000"
            :size="20"
            class="text-white"
            v-if="loading"
        />
        <template v-else>
            Ignore
            <icon name="user-minus" class="w-4 h-4 fill-current ml-1"></icon>
        </template>

        </DangerButton>
    </form>

</template>
<script>
    export default{
        props:['profile'],
        components:{
           DangerButton,
           FulfillingSquareSpinner,
        },
        data(){
            return {
                loading: false
            }
        },
        methods: {
            ignoreRequest() {
                this.loading = true
                this.$inertia.get(this.route('friends.deny', this.profile.id, {
                    onSuccess:()=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Friend request successfully ignored!'
                        })
                        this.loading = false
                    }
                }))
            }
        }
    }
</script>
