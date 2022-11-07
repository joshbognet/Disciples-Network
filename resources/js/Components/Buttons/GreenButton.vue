<template>
    <button :type="type" class=" bg-green-500 hover:bg-green-700 text-white
    font-bold py-2 px-4 items-center justify-center inline-flex rounded" >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'button',
            },

        },

    }
</script>
