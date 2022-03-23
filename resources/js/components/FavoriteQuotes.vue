<template>
    <div class="grid  grid-cols-3 mx-4  my-4 gap-x-6">
        <div  v-for="(post, postKey) in posts.data" :key="postKey">

            <div   :class="classes"   class=" relative bg-white rounded shadow-2xl my-4 mt-6  ">
                <div class="flex justify-between  relative p-4">

                    <div class="flex items-center">
                        <div class="w-10 ml-2">
                            <img :src="post.data.attributes.posted_by.data.attributes
                                .profile_image.data.attributes.path" alt="profile image for user"
                                 class="w-10 h-10 rounded-full">


                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-bold"> {{
                                    post.data.attributes.posted_by.data.attributes.name
                                }}</div>
                            <div dir="ltr" class="text-sm  text-gray-600">

                                <span class="mb-1"> {{ post.data.attributes.posted_at }}</span>

                                <span class="mt-1"><i class="fas fa-globe-americas"></i></span>
                            </div>


                        </div>
                    </div>


                    <div  class="flex-shrink-0   self-center flex">


    <button


                                        @click=" $store.dispatch('addFavoriteQuote', {
                        postId: post.data.post_id,
                        postKey: $vnode.key
                    })
                "

                                        class="text-gray-700 flex px-4 py-2 text-sm"
                                    >
                                        <svg
                                            class="mr-3 h-5 w-5 "

                                            :class="[
                  post.data.attributes.favorites.user_favorite_post
                        ? 'text-Lightblue-500'
                        : 'text-gray-400'
                ]"

                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                            />
                                        </svg>


                                    </button>



                    </div>


                </div>
                <div v-if="post.data.attributes.body"   class="m-4 overflow-hidden">
                    <p>{{ post.data.attributes.body }}</p>
                </div>

                <div   v-if="post.data.attributes.image.length"    class="w-full h-2/4">
                    <img
                        class="w-full h-full"
                        :src="post.data.attributes.image"
                        alt="post image"
                    />
                </div>




                </div>
            </div>
        </div>









    </div>

</template>

<script>

export default {
    name: "FavoriteQuotes.vue",

    data() {
        return {
            //    rating: this.book.reviews_sum,
        //    user:null,
         posts:null,
            showEdit:false,

        };
    },





    mounted() {
        axios.get('/api/favorites-user/'+ this.$route.params.userId).
        then(res=>{
         this.posts=res.data;
        })
            .catch(error=>{
                console.log(error.res);
            });


    },



}
</script>

<style scoped>

</style>
