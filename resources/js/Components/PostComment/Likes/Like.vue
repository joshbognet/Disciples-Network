<template>
    <div class="flex items-center">
        <span class="mr-1 text-slate-400">{{ item.liked }}</span>

        <form @submit.prevent="method">
            <button type="submit" class="transform motion-safe:hover:scale-110 focus:outline-none p-1 visited:text-purple-600 ">
                <icon name="person-praying" class="w-4 h-4 ml-1/2 fill-current mb-1 text-blue-500 hover:text-green-600"></icon>
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['item', 'method']
    }
</script>
