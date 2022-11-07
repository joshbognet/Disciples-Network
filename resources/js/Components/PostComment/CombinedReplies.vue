<template>
    <div>
        <div v-for="(reply, index) in replies" :key="index">
            <reply-item :reply="reply"></reply-item>
        </div>
    </div>
</template>

<script>
import ReplyItem from './ReplyItem.vue';
    export default {
        props: ['replies'],
        components:{
           ReplyItem
        }
    }
</script>
