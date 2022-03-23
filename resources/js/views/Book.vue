<template>

    <div class="bg-gray-100">
        <div class="min-h-full">
            <Nav />

            <div class="py-10">
                <div
                    class="max-w-3xl mx-auto sm:px-6 lg:max-w-full lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8"
                >
                    <Sidbar />

                    <div class="px-3 lg:col-span-10">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center space-x-4">
                                <li>
                                    <div class="flex items-center">
                                        <svg
                                            class="flex-shrink-0 h-5 w-5 text-Lightblue-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            aria-hidden="true"
                                        >
                                            <path
                                                d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"
                                            />
                                        </svg>
                                        <a
                                            href="#"
                                            class="text-sm font-medium text-gray-500 hover:text-gray-700"
                                            >الكتب</a
                                        >
                                    </div>
                                </li>

                                <li>
                                    <div class="flex items-center">
                                        <svg
                                            class="flex-shrink-0 h-5 w-5 text-Lightblue-500"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            aria-hidden="true"
                                        >
                                            <path
                                                d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"
                                            />
                                        </svg>
                                        <a
                                            href="#"
                                            class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                            aria-current="page"
                                            > {{ book.data.attributes.name }}</a
                                        >
                                    </div>
                                </li>
                            </ol>
                        </nav>



  <div class="min-h-screen min-w-full bg-gray-100 flex flex-col justify-center p-6 mt-4">
    <div class="relative w-full max-w-full lg:max-w-6xl xl:max-w-screen-2xl">

      <div class="relative bg-white shadow-lg sm:rounded-3xl">

                                <div
                                    class="w-full relative flex items-center  px-4 pt-6 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8"
                                >
          <!-- hero section -->
          <div class="xl:w-full mt-20 lg:mt-4 lg:ml-16 text-left">
    <div
                                        class="w-full grid grid-cols-1 gap-y-8 gap-x-6 items-start sm:grid-cols-12 lg:gap-x-8"
                                    >
                                        <div
                                            class="rounded-lg border-8 border-Lightblue-100 overflow-hidden sm:col-span-4 lg:col-span-3"
                                        >
                                            <img :src="book.data.attributes.image"
                                                class="h-full w-full"

                                            />
                                        </div>

                                        <div
                                            class="sm:col-span-8 lg:col-span-9"
                                        >
                                            <div class="flex justify-between">
                                                <h2
                                                    class="text-2xl font-extrabold flex justify-strat text-gray-900"
                                                >
                                                    {{ book.data.attributes.name }}
                                                </h2>


                                            </div>

                                            <div class="mt-2">
                                                <h3 class="sr-only">Reviews</h3>
                                                <div class="flex items-center">
                                                    <div
                                                        class="flex mt-2 justify-center items-center"
                                                    >
                                                        <stars-rating

                        :rating="book.data.attributes.reviews.review_sum"    :starStyle="starStyle"  :read-only="true"

                                                        ></stars-rating>
                                                        ( 5 /
                                                        {{ book.data.attributes.reviews.review_sum }}

                                                        )
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-right mt-2">
                                                <p>الكاتب :{{ book.data.attributes.author }}</p>
                                            </div>
                                            <div class="text-right mt-2">
                                                <h2>عن الكتاب</h2>
                                                <div class="flex mt-2">
                                                    <div
                                                        class="w-16 h-1 rounded-full bg-Lightblue-500 inline-flex"
                                                    ></div>
                                                </div>
                                                <p>
                                                    {{ book.data.attributes.description }}
                                                </p>
                                            </div>

                                            <div class="mt-6 w-full flex">
                                                <button   @click="downloadFile()"

                                                    class="inline-flex w-52 items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white bg-Lightblue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-Lightblue-100"
                                                >
<i class="fas fa-download"></i>

                                                 <span class="mr-1">  تحميل</span>
                        </button>
                                            </div>
</div>


</div>



                        <div class="card  my-10 mx-4">

                            <h2
                                class="text-gray-700 text-right"
                            >
                                تقييمات واقتباسات الكتاب
                            </h2>
       <div class="flex mt-2 my-4">
                                                    <div
                                                        class="w-44 h-1 rounded-full bg-Lightblue-500 inline-flex"
                                                    ></div>
                                                </div>


                            <div class=" w-full sm:block">
                                <nav
                                    class="relative z-0 rounded-lg shadow flex divide-x divide-gray-300"
                                >
                                    <a
                                        @click="activeComp = 'ReviewsBook' "

                                      :class="{barActive: activeComp ==='ReviewsBook'}"  class="text-Lightblue-500  flex justify-center rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                                    >
       <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>


                                        <span>التقييمات</span>
                                    </a>

                                    <a
                                        @click="activeComp = 'QuotesBook' "
                                         :class="{barActive: activeComp ==='QuotesBook'}"
                                        class="  text-gray-600 ml-1  flex justify-center  group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium text-center hover:bg-Lightblue-100 focus:z-10"
                                    >


<i class="fas fa-quote-right"></i>


                                        <span class="mr-1">الاقتباسات</span>
                                    </a>

                                    <a
                                        @click="activeComp = 'ReadersBook' "
                                             :class="{barActive: activeComp ==='ReadersBook'}"
                                        class="text-gray-600 flex justify-center text-center hover:text-gray-700 rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-6 text-sm font-medium  hover:bg-gray-50 focus:z-10"
                                    >
               <svg class="h-6 w-6  text-gray-600   fill-current" viewBox="0 0 512 512">
                    <path d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z"/><g><path d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z"/></g>
                </svg>




                                        <span class=" mr-2 text-center">القراء</span>


                                    </a>

                                </nav>

                                    <component :is="activeComp"></component>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                                    </div>

          </div>


          <!-- /hero section -->

      </div>
    </div>
  </div>















                                        </div>



                                    </div>



          <!-- /hero section -->
</div>
      </div>
    </div>
  </div>

</div>
</div>
</div>

</div>



</template>

<script>

import {mapGetters} from 'vuex';
import Nav from "../components/Nav.vue";
import Sidbar from "../components/Sidbar.vue";
import StarsRating from 'vue-dynamic-star-rating';


import AddReviewPopup from "../components/AddReviewPopup.vue";
//import StarRating from "vue-star-rating";
import ReviewsBook from "../components/ReviewsBook.vue";

export default {
    name: "Book.vue",

    components: {
       StarsRating,

ReviewsBook,
AddReviewPopup,
        Nav,
        Sidbar,

    },
    data() {
        return {
      //  rating: this.$store.getters.reviews_sum,

        book:null,
          showEdit: false,
          isVisibility:false,
           activeComp: 'ReviewsBook',

  starStyle: {
            fullStarColor: '#03a9f4',
            emptyStarColor: '#b0bec5',
            starWidth: 20,
            starHeight: 20
        }


        };
    },

    computed: {
        ...mapGetters({
      //    book: "book",
  //  ratings:"ratings"

        }),

        starOneWidth() {
            return Math.round(
                (this.$store.getters.arrStar.sum_one_star /
                    this.$store.getters.arrStar.sum_rating) *
                    100
            );
        },

        starOneWidthStyle() {
            return `width:${this.starOneWidth}%;`;
        },
             star() {
            return `stroke-dashoffset:${this.starOneWidth}%;`;
        },



        starFourWidth() {
            return Math.round(
                (this.$store.getters.arrStar.sum_four_star /
                    this.$store.getters.arrStar.sum_rating) *
                    100
            );
        },

        starFourWidthStyle() {
            return `width:${this.starFourWidth}%;`;
        },

        starTwoWidth() {
            return Math.round(
                (this.$store.getters.arrStar.sum_two_star /
                    this.$store.getters.arrStar.sum_rating) *
                    100
            );
        },

        starTwoWidthStyle() {
            return `width:${this.starTwoWidth}%;`;
        },

        starThreeWidth() {
            return Math.round(
                (this.$store.getters.arrStar.sum_three_star /
                    this.$store.getters.arrStar.sum_rating) *
                    100
            );
        },

        starThreeWidthStyle() {
            return `width:${this.starThreeWidth}%;`;
        },

        starFiveWidth() {
            return Math.round(
                (this.$store.getters.arrStar.sum_five_star /
                    this.$store.getters.arrStar.sum_rating) *
                    100
            );
        },

        starFiveWidthStyle() {
            return `width:${this.starFiveWidth}%;`;
        },
    },
    mounted() {
        //this.$store.dispatch("fetchBook", this.$route.params.bookId);
        this.$store.dispatch("fetchStarRating", this.$route.params.bookId);

  //     this.$store.dispatch("fetchRating", this.$route.params.bookId);

      axios.get('/api/book/'+this.$route.params.bookId ).
        then(res => {
                this.book = res.data;


            })
            .catch(error => {
                console.log('no users');
            });




    },
    methods: {
        toggleModal(){

            this.isVisibility = !this.isVisibility;
        },




    },



};
</script>

<style scoped>

.barActive{
    background-color:#E0F2FE ;
    color: 	#03a9f4;

}
</style>
