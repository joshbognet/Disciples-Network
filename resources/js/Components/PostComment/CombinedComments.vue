<script setup>
import CommentItem from './CommentItem.vue';
</script>
<template>

    <div v-for="(comment, index) in comments" :key="index">
        <comment-item :comment="comment"></comment-item>
    </div>
    
</template>

<script>
    export default {
        props:['comments'],
        components: {
            CommentItem,

        },
    }
</script>
