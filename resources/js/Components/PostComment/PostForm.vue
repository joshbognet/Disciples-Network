<script setup>
    import ComponentInputError from '@/Components/InputError.vue';
    import BlueButton from '@/Components/Buttons/BlueButton.vue';
    import { FulfillingSquareSpinner } from 'epic-spinners';
</script>
<template>
    <form @submit.prevent="method" class="w-full">
        <div>
            <textarea name="post"  class="border border-gray-400 rounded-xxl px-5 py-2 w-full" :placeholder="`Type Something ${ $page.props.user.username }...`" rows="2" v-model="form.body"></textarea>
        </div>
        <div class="flex justify-between my-3">
            <div>
                <ComponentInputError :message="form.errors.body" class="mt-2" v-if="form.errors.body"></ComponentInputError>
            </div>
            <div>
                <blue-button type="submit" class="text-xs" :class="{'opacity-25':form.processing}" :disabled="form.processing">
                    <fulfilling-square-spinner
                    :animation-duration="4000"
                    :size="20"
                    class="text-white"
                    v-if="form.processing"
                    />
                    <span v-else>{{ text }}</span>
                </blue-button>
            </div>

        </div>

    </form>
</template>
<script>
export default {
    props: ['method','form', 'text'],
    components: {

            ComponentInputError,
            FulfillingSquareSpinner,
            BlueButton,

        },

}
</script>
