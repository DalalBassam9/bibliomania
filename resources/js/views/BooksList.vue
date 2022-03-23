<template>
    <div>

        <div class=" bg-gray-100 ">
            <div class="min-h-full">
                <Nav />
                <div class="py-10" >
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-full lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <Sidbar />
                        <main class="lg:col-span-10 ">
 <ul role="list" class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-5 lg:gap-x-8">


        <div  v-for="(book, bookKey) in books.data" :key="bookKey">


        <li
            class=" flex bg-white flex-col text-center rounded-3xl shadow-lg"
        >
            <div class="flex-1 flex flex-col relative">
                    <span class="flex m-2 justify-end text-Lightblue-500">

                            <button


                                @click="$store.dispatch('addFavoriteBook', {
                        bookId: book.data.book_id,

                    })"


                                class="text-gray-700 flex px-4 py-2 text-sm"
                            >


                            <svg height="20"
      :class="[
                  book.data.attributes.favorites.user_favorite_book
                        ? 'text-Lightblue-500'
                        : 'text-gray-400'
                ]"
  width="20" viewBox="0 0 32 32" class="fill-current text-gray-400">
              <path d="M22.5,4c-2,0-3.9,0.8-5.3,2.2L16,7.4l-1.1-1.1C12,3.3,7.2,3.3,4.3,6.2c0,0-0.1,0.1-0.1,0.1c-3,3-3,7.8,0,10.8L16,29	l11.8-11.9c3-3,3-7.8,0-10.8C26.4,4.8,24.5,4,22.5,4z"></path></svg>



                            </button>


                    </span>

                             <img
                                class="w-36 h-52    border-4     hover:shadow-xl transform hover:scale-105 transition duration-500   cursor-pointer   border-Lightblue-100           flex-shrink-0 mx-auto rounded-2xl"
                                :src="book.data.attributes.image"

                                alt="no image"
                            />

                            <div class="flex mt-4 justify-center items-center">
                                <!--<star-rating v-bind:increment="0.5"
        :rating="rating"

                     v-bind:max-rating="5"
                     inactive-color="#000"
                     active-color="#f00"
         :star-style="starStyle"

                    >
        </star-rating>
        -->
                                ( 5 /
                                {{ book.data.attributes.reviews.review_sum }}

                                )
                                <stars-rating
                                    :rating="book.data.attributes.reviews.review_sum"    :starStyle="starStyle"  :read-only="true" >

                                ></stars-rating>


                            </div>


                    <h3 class="mt-2 text-gray-900 text-sm font-medium">
                        {{ book.data.attributes.name }}
                    </h3>

                <dl class="mt-2 mb-4 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-gray-500 text-sm">{{ book.data.attributes.author }}</dd>
                </dl>
            </div>

        </li>
</div>
</ul>
           </main>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

import Nav from "../components/Nav.vue";
import Sidbar from "../components/Sidbar.vue";
import StarsRating from 'vue-dynamic-star-rating';
import {mapGetters} from "vuex";

export default {
    name: "BooksList",


    components: {
        StarsRating,
        Nav,
        Sidbar
    },

    data() {
        return {
            books:null,
            starStyle: {
                fullStarColor: '#03a9f4',
                emptyStarColor: '#b0bec5',
                starWidth: 20,
                starHeight: 20
            }

        };
    },

    mounted() {
        axios.get('/api/get-books/').
        then(res => {
            this.books = res.data;
        })
            .catch(error => {
                console.log('no books');
            });
    }

}
</script>

<style scoped>

</style>
