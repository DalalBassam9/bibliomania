<template>
<div>
<div class="flex flex-col items-center py-4">

        <div class="w-9/12">
        <NewPost  />
        </div>

        <div class="w-9/12   ">
        <p v-if="newsStatus.postsStatus === 'loading'">جاري تحميل الاقتباسات</p>

        <Post v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
        </div>

</div>

</div>
</template>

<script>

import { mapGetters } from 'vuex';
 import Post from '../components/Post';
import NewPost from '../components/NewPost';
export default {
    name: "QuotesUsersList",

   mounted() {
          this.$store.dispatch('fetchNewsPosts');


      },

   components: {
            Post,
            NewPost,



        },


      computed: {
          ...mapGetters({
              posts: 'posts',
              newsStatus: 'newsStatus',
          })
      }


}
</script>

<style scoped>

</style>
