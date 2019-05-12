<template>
    <div>

        <pre>{{pdd}}</pre>

        <div class="container">
            <div class="notification">
                <strong>{{pdd.title}}</strong>

                <div v-if="pdd.img != ''">
                    <img :src="'http://pdd.my/img/' + pdd.img" alt="">
                </div>

                <br>
                <br>

                <template v-for="answer in pdd.answers">
                    <button style="text-align: left; display: block; width: 100%" class="button">
                        {{ answer }}
                    </button>
                    <br>
                </template>

            </div>
        </div>


    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                pdd: {}
            }
        },
        created() {
            axios.get('http://pdd.my/').then(response => {
                this.pdd = response.data;
            });
        },
        methods: {}
    }
</script>

<style>
    @import "../assets/css/bulma.min.css";
</style>