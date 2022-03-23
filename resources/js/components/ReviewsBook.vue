<template>
<div class="mx-4 my-4">

    <div class="grid grid-cols-12">
        <div class="col-span-6  ml-6">

          <div class="flex mt-4">

                  <stars-rating


                        :rating="book.data.attributes.reviews.review_sum"    :starStyle="starStyle"  :read-only="true"

                                                        ></stars-rating>


                      ( 5 /
                                                        {{book.data.attributes.reviews.review_sum}}

                                                        )



            </div>

            <div class="my-4">
                <div class="flex">
                    <span class="mx-2 mb-1">1</span>

                    <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <div class="w-72 bg-gray-200 mt-2 mx-3 rounded-full h-2.5">
                        <div class="bg-Lightblue-500 h-2.5 rounded-full" :style="starOneWidthStyle"></div>
                    </div>

                    <span class=""> {{ starOneWidth }}% </span>
                </div>
                <div class="flex">
                    <span class="mx-2 mb-1">2</span>

                    <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <div class="w-72 bg-gray-200 mt-2 mx-3 rounded-full h-2.5">
                        <div class="bg-Lightblue-500 h-2.5 rounded-full" :style="starTwoWidthStyle"></div>
                    </div>

                    <span class="">{{ starTwoWidth }}%</span>
                </div>

                <div class="flex">
                    <span class="mx-2 mb-1">3</span>

                    <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <div class="w-72 bg-gray-200 mt-2 mx-3 rounded-full h-2.5">
                        <div class="bg-Lightblue-500 h-2.5 rounded-full" :style="starThreeWidthStyle"></div>
                    </div>

                    <span class=""> {{ starThreeWidth }}% </span>
                </div>

                <div class="flex">
                    <span class="mx-2 mb-1">4</span>

                    <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <div class="w-72 bg-gray-200 mt-2 mx-3 rounded-full h-2.5">
                        <div class="bg-Lightblue-500 h-2.5 rounded-full" :style="starFourWidthStyle"></div>
                    </div>

                    <span class="">{{ starFourWidth }}%</span>
                </div>

                <div class="flex">
                    <span class="mx-2 mb-1">5</span>

                    <svg class="text-Lightblue-500 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>

                    <div class="w-72 bg-gray-200 mt-2 mx-3 rounded-full h-2.5">
                        <div class="bg-Lightblue-500 h-2.5 rounded-full" :style="starFiveWidthStyle"></div>
                    </div>

                    <span class="mb-6">{{ starFiveWidth }}%</span>
                </div>
            </div>

            <div class="text-right">
                <p class="mb-4">شارك تقييمك للكتاب.</p>
                <div class="flex-shrink-0 w-72 mt-2">


                    <div v-if="isVisibility">
                        <div   class="fixed z-10 inset-0 overflow-y-auto">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                            >
                                <div
                                    @click.prevent="close"
                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                ></div>

                                <div
                                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                                >
                                    <div class="bg-white flex">
                                        <div
                                            class="hidden sm:block absolute top-0 right-0 pt-4 pr-4"
                                        >
                                            <button
                                                type="button"
                                                @click.prevent="close()"
                                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none"
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

                          <div class="sm:flex sm:items-start">

                            <div class=" flex flex-col  py-6  sm:px-6  lg:px-20">
                                <div class="mx-auto  max-w-sm lg:w-80">
                                    <div>
                                        <h2 class="mt-2 pb-7 text-2xl text-center  text-gray-600">
                                        تقييم الكتاب
                                        </h2>
                                    </div>


                                                        <div class="flex mt-4">
                                                            <div >


                                                                <star-rating
                                                                    v-model="review"
                                                                    :increment="1"
                                                                    inactive-color="#cbd5e1"
                                                                    active-color="#03a9f4"

                                                                >
                                                                </star-rating>

<div class="my-6">


             <button

 @click="$store.dispatch('setRating', {review:review,bookId:book.data.book_id });review='';isVisibility = !isVisibility;"
            class="flex justify-center rounded-2xl text-white items-center w-full px-4 py-2 border border-transparent text-sm font-medium shadow-sm bg-Lightblue-500 focus:outline-none">
                                                                    <svg class="-ml-1 mr-0.5 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                                    </svg>

                                                                    <span class="mr-1">أضف تقييم</span>
                                                                </button>
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
                    </div>



                    <button @click.prevent="close()" type="button" class="flex justify-center rounded-2xl text-white items-center w-full px-4 py-2 border border-transparent text-sm font-medium shadow-sm bg-Lightblue-500 focus:outline-none">
    <svg class="-ml-1 mr-0.5 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>

                        <span class="mr-1">أضف تقييم</span>
                    </button>





                </div>
            </div>
        </div>

        <div class="col-span-6 mr-12" >

        <div  v-for="(rating, ratingKey) in ratings.data" :key="ratingKey">

            <div class="flex   border-gray-300 border-b mr-6 mt-4">
                <div class=" ">
                    <img class="w-10 h-10  rounded-full flex-shrink-0 " :src="rating.data.attributes.review_by.data.attributes.profile_image.data.attributes.path"  />
                </div>

            <div class="mb-4 ">

<div dir="ltr" class="ml-6">
                    <p class="text-sm text-gray-600">

                    {{ rating.data.attributes.review_at }}
                    </p>

                </div>

          <div class="mr-2 mt-2  text-gray-600 text-right">

                    {{ rating.data.attributes.review_by.data.attributes.name }}
                </div>

                <div class="flex mt-2">

  <stars-rating :rating="rating.data.attributes.review" :starStyle="starStyle"></stars-rating>


                </div>
                <p class=" my-2 text-gray-600 text-right">

                </p>
            </div>
            </div>
        </div>
        </div>

    </div>
</div>
</template>

<script>


import { mapGetters } from "vuex";
import StarRating from "vue-star-rating";
import StarsRating from 'vue-dynamic-star-rating';
import AddReviewPopup from "./AddReviewPopup.vue";
import axios from "axios";

export default {
    name: "ReviewsBook.vue",

    data() {
        return {
          ratings_user: null,
            arrStar: [],
           book: null,
            isVisibility: false,
            current_page: null,
            next_page_url: null,
            starStyle: {
                fullStarColor: '#03a9f4',
                emptyStarColor: '#b0bec5',
                starWidth: 20,
                starHeight: 20
            },

           review: null,
            //comment: '',
        };


    },

    components: {
        StarRating,
          StarsRating,
        AddReviewPopup,
    },

    created() {},

    computed: {
        ...mapGetters({
         //  book: "book",
        ratings: "ratings",
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

        this.$store.dispatch("fetchRating", this.$route.params.bookId);
        this.$store.dispatch("setRating", this.$route.params.bookId);
        this.$store.dispatch("fetchStarRating", this.$route.params.bookId);


 axios.get('/api/book/'+this.$route.params.bookId ).
        then(res => {
                this.book = res.data;
            })
            .catch(error => {
                console.log('no users');
            });


 axios.get('/api/get-rating/' + this.$route.params.bookId)
            .then(res => {

         this.ratings_user=res.data

                })
                .catch((error) => {
                    console.log(error.response);
                });


            },




    methods: {
       close() {
            this.isVisibility = !this.isVisibility;
        },


    },

};
</script>

<style scoped>
.active {
    background-color:#E0F2FE ;
    color: 	#03a9f4;

}


</style>

