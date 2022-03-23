<template>
    <div>
        <Nav />
        <div class="py-4" v-if="authUser" >
            <div class="w-4/5 mx-auto sm:px-6lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">

                <article class=" lg:col-span-12"     v-if="status.user === 'success' && user" >
                    <div class="">
                        <div class="relative   bg-white  mb-8">
                            <div class=" overflow-hidden z-20">
                                <div class="w-100 h-64  z-10">

                                    <div class="w-full h-96">
                                    <img
                                       class="object-cover w-full h-full "
                                                     :src="user.data.attributes.cover_image.data.attributes.path"/>

</div>
                                    <button v-if="authUser.data.user_id === user.data.user_id"   @click.prevent="changeCover"
                                            class="px-4 mb-4
                    py-2 border border-gray-300 shadow-sm  absolute flex justify-center items-center top-52    left-3  ml-12 z-10
                     text-sm font-medium rounded-2xl text-gray-700 bg-white
                      focus:outline-none "
                                    >

                                        <i class="fas fa-camera text-Lightblue-500  fa-lg"></i>
                                        <span class="mr-1 text-Lightblue-500">تعديل  صورة الغلاف</span>

                                    </button>



                                    <div v-if="openCover"   class="fixed z-10 inset-0 overflow-y-auto">
                                        <div
                                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                                        >
                                            <div   @click.prevent="changeCover"

                                                   class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                            ></div>

                                            <div
                                                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                                            >

                                                <div class="bg-white flex">

                                                    <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                                        <button  @click.prevent="changeCover"
                                                                 type="button"

                                                                 class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none "
                                                        >

                                                            <svg
                                                                class="h-6 w-6"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor"
                                                                aria-hidden="true"
                                                            >
                                                                <path
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M6 18L18 6M6 6l12 12"
                                                                />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="sm:flex sm:items-start">

                                                        <div class=" flex flex-col  py-6  sm:px-6  lg:px-20">
                                                            <div class="mx-auto  max-w-sm lg:w-80">
                                                                <div>
                                                                    <h2 class="mt-2 pb-7 text-2xl text-center font-extrabold text-gray-900">
                                                                    تعديل صورة الغلاف الشخصي
                                                                    </h2>
                                                                </div>

                                                                <div class="w-72">


                                                                    <ChangeCoverImage image-width="1200"
                                                                                      @changeCoverImage="changeCover"

                                                                                      image-height="700"
                                                                                      location="cover"
                                                                                      alt="user background image"
                                                                                      classes="object-cover flex  justify-center items-center  w-44"
                                                                                      :cover-image="user.data.attributes.cover_image"/>




                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                            </div>





</div>
                                        </div>


                                    </div>


                                <div class="absolute flex justify-center absolute mx-auto my-auto top-32 inset-x-0">

                                    <div >

                                        <div  v-if="authUser.data.user_id === user.data.user_id"  @click.prevent="changeProfileImage"   class="flex justify-center mt-6 items-center text-sm text-gray-600">


                                            <div

                                                class="relative flex  px-4 py-2  rounded-2xl font-medium text-gary-500  cursor-pointer focus-within:outline-none "
                                            >

                                                <div class=" bg-white block rounded-full p-1 " >
                                                    <img  class="h-36 w-36 rounded-full" :src="user.data.attributes.profile_image.data.attributes.path" alt="User Avatar">
                                                </div>

                                                <button class="absolute bottom-8 right-3 bg-Lightblue-500 rounded-full
                                                 h-8 w-8 text-2xl mx-2 py-3

        text-white border-2
         border-white flex justify-center items-center ">
                                                    <i class="fas fa-camera fa-xs"></i>

                                                </button>
                                            </div>
                                        </div>

                                        <div  v-else    class="flex justify-center mt-6 items-center text-sm text-gray-600">


                                            <div

                                                class="relative flex  px-4 py-2  rounded-2xl font-medium text-gary-500  cursor-pointer focus-within:outline-none "
                                            >

                                                <div class=" bg-white block rounded-full p-1 " >
                                                    <img  class="h-36 w-36 rounded-full" :src="user.data.attributes.profile_image.data.attributes.path" alt="User Avatar">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="text-center">

                                            <h2 class="text-xl">{{user.data.attributes.name}}</h2>
                                            <p>{{user.data.attributes.bio}}</p>

                                        </div>


                                        <div v-if="showImage"   class="fixed z-10 inset-0 overflow-y-auto">
                                            <div
                                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                                            >
                                                <div  @click.prevent="cancel"

                                                      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                                ></div>

                                                <div
                                                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                                                >

                                                    <div class="bg-white flex">

                                                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                                            <button  @click.prevent="changeProfileImage"
                                                                     type="button"

                                                                     class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none "
                                                            >

                                                                <svg
                                                                    class="h-6 w-6"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24"
                                                                    stroke="currentColor"
                                                                    aria-hidden="true"
                                                                >
                                                                    <path
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M6 18L18 6M6 6l12 12"
                                                                    />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="sm:flex sm:items-start">

                                                            <div class=" flex flex-col  py-6  sm:px-6  lg:px-20">
                                                                <div class="mx-auto  max-w-sm lg:w-80">
                                                                    <div>
                                                                        <h2 class="mt-2 pb-7
                                                                        text-xl text-center  justify-center items-center   text-gray-500">
                                                                            تعديل الصورة الشخصية
                                                                        </h2>
                                                                    </div>

                                                                    <div class="w-32 mr-20  ">
                                                                        <UploadableImage image-width="750"
                                                                                         @changeProfile="changeProfileImage"


                                                                                         image-height="750"
                                                                                         location="profile"
                                                                                         alt="user profile image"
                                                                                         classes="object-cover   w-32 h-32 border-4 border-gray-200 rounded-full shadow-lg"
                                                                                         :user-image="user.data.attributes.profile_image"/>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>




                                        </div>


                                    </div>



                                </div>

                            </div>



                            <div class="justify-end mr-4 mt-40">

                                <edit-profile-popup v-if="isVisibility" @toggle-modal="toggleModal" ></edit-profile-popup>


                                <div class="flex">
                                <button v-if="authUser.data.user_id === user.data.user_id"  @click.prevent="toggleModal"
                                        class="inline-flex justify-center px-4 mb-4
                    py-2 border border-gray-300 shadow-sm
                     text-sm font-medium rounded-2xl text-gray-700 bg-Lightblue-500
                      focus:outline-none "
                                >
                                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    <span class="mr-1 text-white">تعديل الملف الشخصي</span>
                                </button>






                                <button v-if="friendButtonText && friendButtonText !== 'Accept' && friendButtonText !== 'حذف صديق'  "
                                        class="inline-flex justify-center px-4 mb-4
                    py-2 border border-gray-300 shadow-sm
                     text-sm font-medium rounded-2xl text-white bg-Lightblue-500
                      focus:outline-none"

                                        @click="$store.dispatch('sendFriendRequest', $route.params.userId)">
                                    <svg   class=" h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                   <span class="mr-2"> {{ friendButtonText }}</span>
                                </button>


                                    <button v-if="friendButtonText === 'حذف صديق'    && friendButtonText !== 'Accept'"
                                            class="inline-flex justify-center px-4 mb-4
                    py-2 border border-gray-300 shadow-sm
                     text-sm font-medium rounded-2xl text-white bg-Lightblue-500
                      focus:outline-none">
                                        <i class="fas fa-user-times"></i>
                                        <span class="mr-2"> حذف صديق </span>
                                    </button>


                                    <div class="mb-2">
                                    <button v-if="friendButtonText && friendButtonText === 'Accept'"
                                            class="flex justify-center px-6
                    py-2 border border-gray-300 shadow-sm
               font-medium rounded-2xl text-white bg-Lightblue-500
                      focus:outline-none"
                                            @click="$store.dispatch('acceptFriendRequest', $route.params.userId)">
                                        <i class="fas mt-1  fa-check"></i>
                                        <span class="mr-1    text-md ">قبول</span>
                                    </button>
</div >
                                    <div   class="mr-4    mb-2" >
                                    <button v-if="friendButtonText && friendButtonText === 'Accept'"
                                            class="flex justify-center items-center
                   border border-gray-300 shadow-sm px-6 py-2
                    rounded-2xl text-white bg-gray-400
                      focus:outline-none"
                                            @click="$store.dispatch('ignoreFriendRequest', $route.params.userId)">
                                        <i class="fas fa-times mt-1 fa-xs"></i>
                                      <span class="mr-1    text-md ">رفض</span>
                                    </button>





</div>



                                </div>


                            </div>
                        </div>




                    </div>




                    <div class="card my-4 ">
                        <div class=" bg-white w-full sm:block">
                            <nav
                                class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200"
                            >
                                <a
                                    @click="activeComp = 'Quotes'"
                                    :class="{
                                        barActive: activeComp === 'Quotes'
                                    }"
                                    class="text-gray-600 flex justify-center items-center rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                                >

<i class="fas fa-quote-right"></i>
                                    <span class="mr-1">الاقتباسات</span>
                                </a>

                                <a
                                    @click="activeComp = 'FavoritesBook'"
                                    :class="{
                                        barActive:
                                            activeComp === 'FavoritesBook'
                                    }"
                                    class="text-gray-500 flex  justify-center items-center rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                                >
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6  flex-shrink-0  w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>

                                    <span class="mr-1">الكتب المفضلة </span>
                                </a>
                                <a
                                    @click="activeComp = 'FavoriteQuotes'"
                                    :class="{
                                        barActive:
                                            activeComp === 'FavoriteQuotes'
                                    }"
                                    class="text-gray-500     flex  justify-center items-center         rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                                >

<i class="fas fa-quote-right"></i>

                                    <span class="mr-1">الاقتباسات المفضلة </span>
                                </a>
                            </nav>

                            <component :is="activeComp"></component>
                        </div>
                    </div>




                </article>




            </div>
        </div>

        <div>

        </div>

    </div>

</template>

<script>
import Dropzone from "dropzone";
import Post from "../../components/Post";
import Nav from "../../components/Nav";
import NewPost from "../../components/NewPost";
import ChangeCoverImage from "../../components/ChangeCoverImage";
import UploadableImage from "../../components/UploadableImage";
import EditProfilePopup from "../../components/EditProfilePopup";
import EditProfileImage from "../../components/EditProfileImage";
import FavoritesBook from "../../components/FavoritesBook";
import FavoriteQuotes from "../../components/FavoriteQuotes";
import Quotes from "../../components/Quotes";

import { mapGetters } from "vuex";

export default {
    name: "Show",

    components: {
        Post,
        UploadableImage,
        NewPost,
        EditProfilePopup,
        FavoritesBook,
        FavoriteQuotes,
        Quotes,
        Nav,
        EditProfileImage,
        ChangeCoverImage,

    },
    data: () => {
        return {
            activeComp: "Quotes",
            isVisibility: false,
            showImage: false,
            openCover:false,
            dropzone: null,

        };
    },

    mounted() {
        this.$store.dispatch("fetchUser", this.$route.params.userId);
        this.$store.dispatch("fetchUserPosts", this.$route.params.userId);
        this.$store.dispatch("fetchAuthUser");
    },

    methods: {
        toggleModal() {
            this.isVisibility = !this.isVisibility;
        },
        changeProfileImage() {
            this.showImage = !this.showImage;
        },
        changeCover(){
            this.openCover = ! this.openCover;
        }
    },

    computed: {
        ...mapGetters({
            user: "user",
            authUser: "authUser",
            posts: "posts",
            status: "status",
            friendButtonText: "friendButtonText"
        })
    }
};



</script>

<style scoped>
.barActive {
    background-color: #e0f2fe;
    color: #03a9f4;
}
</style>
