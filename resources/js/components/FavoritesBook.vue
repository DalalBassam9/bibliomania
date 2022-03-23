<template>

    <div>

    <ul class="grid  grid-cols-5 mx-4 my-8 gap-x-6">

        <div  v-for="(book, bookKey) in books.data" :key="bookKey">


        <li
            class=" flex bg-white flex-col text-center mb-4 rounded-3xl shadow-2xl"
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

  width="20" viewBox="0 0 32 32" class="fill-current text-Lightblue-500">
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
    </div>
    </template>

    <script>


import StarsRating from 'vue-dynamic-star-rating';

        export default {
            name: "FavoritesBook",


    components: {
        StarsRating,
    },



            data() {
                return {
                    //    rating: this.book.reviews_sum,
                    //    user:null,
                    books:[],
                    showEdit:false,

     starStyle: {
                fullStarColor: '#03a9f4',
                emptyStarColor: '#b0bec5',
                starWidth: 20,
                starHeight: 20
            }


                };
            },


            mounted() {
                axios.get('/api/get-favorites-book/'+ this.$route.params.userId).
                then(res=>{
                    this.books=res.data;
                })
                    .catch(error=>{
                        console.log(error.res);
                    });


            },



        }
    </script>


