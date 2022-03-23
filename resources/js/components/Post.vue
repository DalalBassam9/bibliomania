<template>
     <div   :class="classes"   class=" relative bg-white rounded shadow  mt-6  ">
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
      <div  class=" inline-block relative   text-left">

          <button
                   @click="showDrop = !showDrop"  type="button"    class="-m-2 p-2 rounded-full relative   flex items-center text-gray-400 hover:text-gray-600"
       >

            <svg class="h-5 w-5"     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
            </svg>
          </button>


        <div  v-if="showDrop"   class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
          <div class="py-1">
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
                                <span

                                      v-if="post.data.attributes.favorites.user_favorite_post">
                                   حذف من المفضلة



                                    {{
                                        post.data.attributes.favorites
                                            .favorite_count
                                    }}
                                </span>
                                <span

                                    v-else>
                               اضافة الى المفضلة



                                    {{
                                        post.data.attributes.favorites
                                            .favorite_count
                                    }}
                                </span>

                            </button>

      <button
                                @click="
                                    $store.dispatch('deleteQuote', {
                                        postId: post.data.post_id
                                    })
                                "
                                class="text-gray-700 flex px-4 py-2 text-sm"
                                id="menu-0-item-2"
                            >
                                <svg
                                    class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                <span>حذف</span>
                            </button>


          </div>
        </div>
      </div>
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

    <div class="px-4 pt-2 flex justify-between text-gray-700 text-sm">
      <div class="flex">
          <svg height="20"  :class="[ post.data.attributes.likes.like_count ? 'text-Lightblue-400' : ' ' ]"  width="20" viewBox="0 0 32 32" class="fill-current text-gray-400">
              <path d="M22.5,4c-2,0-3.9,0.8-5.3,2.2L16,7.4l-1.1-1.1C12,3.3,7.2,3.3,4.3,6.2c0,0-0.1,0.1-0.1,0.1c-3,3-3,7.8,0,10.8L16,29	l11.8-11.9c3-3,3-7.8,0-10.8C26.4,4.8,24.5,4,22.5,4z"></path></svg>

        <p class="mr-1">{{ post.data.attributes.likes.like_count }} الاعجابات</p>
      </div>

      <div>
        <p> {{ post.data.attributes.comments.comment_count }} التعليقات</p>
      </div>
    </div>

    <div class="flex justify-between border-1 border-gray-400 m-4">
      <button
                @click="
                    $store.dispatch('likePost', {
                        postId: post.data.post_id,
                        postKey: $vnode.key
                    })
                "
        class="flex justify-center py-2      rounded-lg text-sm w-full focus:outline-none"
      >

    <svg height="20" :class="[
                    post.data.attributes.likes.user_likes_post
                        ? 'text-Lightblue-500'
                        : ''
                ]"  width="20" viewBox="0 0 32 32" class="fill-current text-gray-400">
              <path d="M22.5,4c-2,0-3.9,0.8-5.3,2.2L16,7.4l-1.1-1.1C12,3.3,7.2,3.3,4.3,6.2c0,0-0.1,0.1-0.1,0.1c-3,3-3,7.8,0,10.8L16,29	l11.8-11.9c3-3,3-7.8,0-10.8C26.4,4.8,24.5,4,22.5,4z"></path></svg>



          <p class="mr-2">اعجاب</p>

      </button>
      <button  @click="comments = ! comments"
        class="flex justify-center py-2 rounded-lg text-sm text-gray-700 w-full  focus:outline-none"

      >

    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                        </svg>
        <p class="mr-2">تعليق</p>
      </button>
    </div>

  <div  class="border-t border-gray-400 p-4 pt-2">
            <div class="flex"   >
                <input  v-model="commentBody" type="text" name="body" class="w-full pl-4 h-8 bg-Lightblue-100 px-2 py-2 rounded-lg focus:outline-none" placeholder="اكتب تعليقك">
                <button    v-if="commentBody"      @click="$store.dispatch('commentPost', {
                            body: commentBody,
                            postId: post.data.post_id,
                            postKey: $vnode.key
                        });
                        commentBody = '';
                    "
                                   type="button"
                    class="bg-Lightblue-500 w-44 flex text-center justify-center mr-2 px-2 py-1 rounded-2xl focus:outline-none" >
                    <svg class=" h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="mr-1  text-white"> اضف تعليق</span>

                </button>
            </div>
            <div
                class="flex my-4 items-center"
                v-for="comment in post.data.attributes.comments.data"
            >
            <div class="w-8 mb-4 ml-2">
                    <img :src="comment.data.attributes.commented_by.data.attributes
                                .profile_image.data.attributes.path" alt="profile image for user" class="w-8 h-8  object-cover rounded-full">
                </div>
                <div class="ml-4 flex-1">
                <div class="bg-Lightblue-100 text-right rounded-lg p-2 text-sm">
                        <a class="font-bold text-Lightblue-500" :href="
                                '/users/' +
                                    comment.data.attributes.commented_by.data
                                        .user_id
                            ">

                        </a>
        <p class="inline">
                            {{ comment.data.attributes.body }}
                        </p>
                    </div>
                    <div class="text-xs pl-2">
                        <p>{{ comment.data.attributes.commented_at }}</p>
                    </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
    loading: false,

    props: ["post"],

    data: () => {
        return {
            comments: false,
            commentBody: "",
            showDrop: false,
            loading: false
        };
    },

    methods: {
        addFavoriteQuote(post) {

                axios
                    .post("/api/favorites/" + post.data.post_id)
                    .then(res => {
                     //   post.favorited = res.data.favorited;

                    })
                    .catch(error => {
                        console.log(error.response);
                    });
            }
        }

};
</script>

<style scoped>
.favorited {
    color: #0ea5e9;
}
.liked {
    color: #0ea5e9;
}
</style>
