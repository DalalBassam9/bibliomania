<template>
    <div>

        <div v-if="authUser"   class="fixed z-10 inset-0 overflow-y-auto">


</div>
    </div>




</template>

<script>
import axios from "axios";
import UploadableImage from "../components/UploadableImage";
import {mapGetters} from "vuex";


export default {

    data() {
        return {
            showEdit: false,
            errors: {},
            loading: false,
            success: null,




        };

    },

    components: {
        UploadableImage,


    },


    computed: {
        ...mapGetters({

            authUser: 'authUser',
            user: 'user',

        }),
    },



    mounted() {

        this.$store.dispatch('fetchUser', this.$route.params.userId);
        this.$store.dispatch('fetchAuthUser');



    },


    methods: {
        cancel()
        {
            this.$emit("changeProfile");
        },

    },









};
</script>
<style scoped>
.has-error{
    border-style: solid;
    border-color: red;

}
.error-feedback{
    color:red;
}

</style>
