<template>

    <div class="grid grid-cols-12 "  v-if="status.user === 'success' && user" >
    <main class="lg:col-span-9 mr-4  xl:col-span-6   ">


      <div   v-if="authUser.data.user_id === user.data.user_id"    class="flex mt-8 shadow-xl justify-center items-center">
            <NewPost/>


       </div>

        <div   class=" mt-6 ">

            <div v-if="status.posts === 'loading'">Loading Quotes</div>

            <div v-else-if="posts.length < 1">No posts found. Get started...</div>

            <Post   classes="w-7/12   " v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
        </div>
    </main>

    <aside class=" mt-8  mx-5 xl:col-span-6">

            <div class=" shadow-xl">
              <section aria-labelledby="who-to-follow-heading">
                <div class="bg-white rounded-lg shadow">
                  <div class="p-6">
                <div class="flex justify-between">
                    <h2
                      id="who-to-follow-heading"
                      class="text-base font-medium text-gray-900"

                    >
                    الاصدقاء
                    </h2>

                    <p class="text-gray-700  ">مشاهدة جميع الاصدقاء</p>
                </div>
                    <div class="mt-6 ">
                      <ul    role="list" class="-my-4 grid grid-cols-3">



                      <div  v-for="(friend, friendKey) in friends" :key="friendKey"  >

 <!-- <div v-for="user in friend.users">-->


  <router-link :to="'/profile/'+  friend.id">
                        <li class=" py-4">
                          <a class="flex-shrink-0 ">
                            <img
                              class="h-32 w-32 rounded-2xl"
                              :src="'/storage/'+ friend.profile_image.path"
                              alt=""
                            />
  <span class="inline-block text-sm">{{friend.name}}</span>


                          </a>


                        </li>

</router-link>

</div>




                      </ul>
                    </div>


                    <div class="mt-6">
                      <a
                        href="#"
                        class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-2xl text-white bg-Lightblue-500 "
                      >
                        رؤية الجميع
                      </a>
                    </div>
                  </div>
                </div>
              </section>

            </div>

        <aside    v-if="authUser.data.user_id === user.data.user_id"  class="mt-12">
            <div class=" top-4 space-y-4">
                <section aria-labelledby="who-to-follow-heading">
                    <div class="bg-white rounded-lg shadow-xl">
                        <div class="p-6">
                            <h2
                                class="text-base font-medium text-gray-900"
                            >
                               طلبات الصداقة المعلقة
                            </h2>

                            <div v-for="(pending, pendingKey) in pendings" :key="pendingKey"  >
                                <div class="mt-6 flow-root">
                                    <ul role="list" class="-my-4 divide-y divide-gray-200">
                                        <li class="flex items-center py-4 space-x-3">
                                            <div class="flex-shrink-0 ml-2">
                                                <img
                                                    class="h-8 w-8 rounded-full"
                                                    :src="'/storage/'+ pending.profile_image.path"
                                                    alt="user image"
                                                />
                                            </div>
                                            <div class="min-w-0 ml-8 flex-1">
                                                <p class="text-sm font-medium text-gray-900">
                                                    <router-link :to="'profile/'+ pending.id">{{pending.name}}</router-link>
                                                </p>

                                            </div>


  <router-link :to="'/profile/'+  pending.id">

                                            <div class="flex-shrink-0">
                                                <button
                                                    type="button"
                                                    class="inline-flex items-center px-3 py-2 rounded-2xl bg-Lightblue-100 text-sm font-medium text-Lightblue-500"
                                                >
                                                    <!-- Heroicon name: solid/plus-sm -->
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="pr-1">
                                الملف الشخضي
                              </span>
                                                </button>
                                            </div>

</router-link>


                                        </li>

                                    </ul>
                                </div>



                                </div>


                        </div>
                    </div>
                </section>

            </div>
        </aside>












    </aside>



    </div>
</template>

<script>


import Post from '../components/Post';
import NewPost from '../components/NewPost';
import {mapGetters} from "vuex";

export default {
    name: "Quotes",
    data() {
        return {

         //   friends:[],

         pendings:[],

        };
    },

    components: {
        Post,
        NewPost

    },
    mounted() {
        this.$store.dispatch('fetchUserPosts', this.$route.params.userId);

 this.$store.dispatch('fetchAuthUser');
        this.$store.dispatch('fetchFriends', this.$route.params.userId);



 axios.get('/api/get-requests').
        then(res=>{
         this.pendings=res.data.pendings;
        })
            .catch(error=>{
                console.log(error.res);
            });


},




    computed: {
        ...mapGetters({
            posts: 'posts',
            user: 'user',
            status: 'status',
             friends:'friends',
authUser:'authUser',

        }),
    }



}
</script>

<style scoped>

</style>
