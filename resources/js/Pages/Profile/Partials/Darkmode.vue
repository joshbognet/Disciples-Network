<script setup>
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
  <div class="flex justify-center items-center h-screen flex-col">
    <button
      @click="toggleDark()"
      class="px-4 py-2 text-white bg-gray-600 dark:bg-purple-700"
    >
      Dark Toggle
    </button>
    
  </div>
</template>
