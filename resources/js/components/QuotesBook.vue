<template>
    <div>
    <div>
        <NewQuote @quote-added="addQuote"></NewQuote>

</div>

        <div >
            <div class="min-w-screen min-h-screen bg-gray-200 flex items-center justify-center px-5 py-5">
                <div class="w-full mx-auto rounded-lg bg-white shadow-lg px-5 pt-5 pb-10 text-gray-800" style="max-width: 500px">
                    <div class="w-full pt-1 pb-5">
                        <div class="overflow-hidden rounded-full w-20 h-20 -mt-16 mx-auto shadow-lg">
                            <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="">
                        </div>
                    </div>
                    <div class="w-full mb-10">
                        <div class="text-3xl text-indigo-500 text-left leading-tight h-3">“</div>
                        <p class="text-sm text-gray-600 text-center px-5">
                            كتاب سيغير طريقة تفكيرك وحكمك على الأشياء. يحتوي على مجموعة مقالات تتمحور غالبا عن تطوير الذات والبرمجة اللغوية العصبية وطرق التفكير والوعي والسلوك الإنساني.


                            </p>
                        <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3">”</div>
                    </div>

                    <div class="w-full">
                        <p class="text-md text-indigo-500 font-bold text-center">Scott Windon</p>
                        <p class="text-xs text-gray-500 text-center">@scott.windon</p>
                    </div>
                </div>
            </div>
</div>
    </div>

</template>

<script>
import NewQuote from "../components/NewQuote.vue";
export default {
    name: "QuotesBook.vue",

    data() {
        return {
            quotes:[],
        };
    },
    components: {
        NewQuote,

    },

        mounted() {
                axios.get('api/get-quotes' + this.$route.params.bookId)
                .then((res) => {
                    this.quotes = res.data.quotes;
                })
                .catch((error) => {
                    console.log(error.res);
                })

        },

    methods: {
        addQuote(quote) {
            this.quotes.data.unshift(quote);
        },
    }
};
</script>

<style scoped></style>
