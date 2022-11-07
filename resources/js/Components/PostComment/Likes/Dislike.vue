<template>
    <div class="flex items-center">

        <span class="text-slate-400">{{ item.disliked }}</span>
        <form @submit.prevent="method">
            <button type="submit" class="p-1 transform motion-safe:hover:scale-110 
            focus:outline-none">
                <icon name="heart" class="w-4 h-4 ml-1/2 mb-1/2 fill-current text-red-500 hover:text-red-600"></icon>
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['item', 'method']
    }
</script>
