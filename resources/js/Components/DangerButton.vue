<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class=" bg-red-500 hover:bg-red-700 text-white
    font-bold py-2 px-4 items-center justify-center inline-flex rounded">
      <slot></slot>
    </button>
</template>
