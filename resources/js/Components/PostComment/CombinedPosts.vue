<script setup>
import PostItem from './PostItem.vue';

</script>
<template>
    <div v-for="(post, key) in posts" :key="key">
        <post-item :post="post"></post-item>
    </div>
</template>
<script>
export default {
    props:['posts'],
    components: {
            PostItem,
        }
}
</script>
