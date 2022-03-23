<template>
    <div  v-if="authUser" class=" bg-gray-100 ">

        <div class="min-h-full">
            <Nav />

            <div class="py-8" >
                <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-full lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                    <Sidbar />
                    <main class="lg:col-span-9 xl:col-span-6">

                        <div class="card   mx-4">


                            <div class=" w-full sm:block">
                                <nav
                                    class="relative z-0      rounded-lg shadow flex divide-x divide-gray-300"
                                >
                                    <a
                                        @click="activeComp = 'BooksLatest' "

                                        :class="{barActive: activeComp ==='BooksLatest'}"  class=" flex justify-center text-gray-500     rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                                    >

                                        <span>احدث الكتب المتاحة</span>
                                    </a>

                                    <a
                                        @click="activeComp = 'QuotesUsersList' "
                                        :class="{barActive: activeComp ==='QuotesUsersList'}"
                                        class="  text-gray-500   flex justify-center  group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center focus:z-10"
                                    >


                                        <span class="mr-1">اقتباسات الاصدقاء</span>
                                    </a>
                                </nav>
                                <component :is="activeComp"></component>
                            </div>
                        </div>

                    </main>

                    <aside class="hidden xl:block xl:col-span-4">
                        <div class=" top-4 space-y-4">
                            <section aria-labelledby="who-to-follow-heading">
                                <div class="bg-white rounded-lg shadow">
                                    <div class="p-6">
                                        <h2
                                            id="who-to-follow-heading"
                                            class="text-base font-medium text-gray-900"
                                        >
                                            احدث القراء
                                        </h2>
                                        <UsersList
                                            v-for="user in users.data" :user="user" :key="user.id" />
                                        <div class="mt-6">
                                            <router-link
                                                :to="'/users/'"
                                                class="w-full block text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-2xl text-white bg-Lightblue-500">

                                                رؤية الجميع


                                            </router-link>
                                        </div>


                                    </div>
                                </div>
                            </section>

                        </div>
                    </aside>

                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
  import { mapGetters } from 'vuex';
  import NewPost from '../components/NewPost';
  import Post from '../components/Post';
  import Nav from '../components/Nav.vue';
  import Sidbar from '../components/Sidbar.vue';
  import BooksLatest from "../components/BooksLatest";
  import QuotesUsersList from "../components/QuotesUsersList";
  import UsersList from  '../components/UsersList.vue';

  export default {
      name: "NewsFeed",

      components: {
          NewPost,
          Post,
          UsersList,
          BooksLatest,
          QuotesUsersList,
          Nav,
          Sidbar,
      },




      data() {
          return {
              quotes: [],
              activeComp: 'BooksLatest',
              users: null,
            //  books: [],
              isOpen: false,
          }
      },


      methods: {




  },

      mounted() {
          this.$store.dispatch('fetchNewsPosts');
          this.$store.dispatch('fetchUser', this.$route.params.userId);
          this.$store.dispatch('fetchUserPosts', this.$route.params.userId);
          this.$store.dispatch('fetchBooks');
   this.$store.dispatch('fetchAuthUser');



          axios.get('/api/get-users/').
          then(res => {
              this.users = res.data
          })
              .catch(error => {
                  console.log('no users');
              });

      },

      computed: {
          ...mapGetters({
              posts: 'posts',
              books:'books',
              newsStatus: 'newsStatus',
                authUser:'authUser',
          })
      }
  }
</script>

<style scoped>

.barActive{
    background-color:#E0F2FE ;
    color: 	#03a9f4;

}
</style>
