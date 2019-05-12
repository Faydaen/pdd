<template>
    <div>

<!--        <pre>{{pdd}}</pre>-->
        <br>
        <br>
        <br>

        <div class="container">
            <div class="notification">
                <strong>{{pdd.title}}</strong>

                <div v-if="pdd.img !== ''">
                    <img :src="'http://pdd.my/img/' + pdd.img" alt="">
                </div>

                <br>
                <br>

                <template v-for="(answer, index)  in pdd.answers">
                    <button @click="say_answer(index)" style="text-align: left; display: block; width: 100%" class="button">
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

    // class question {
    //     constructor(question) {
    //         this.name = name;
    //     }
    //
    // }

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
        methods: {
            say_answer(index){
                alert(index)
            }
        }
    }
</script>

<style>
    @import "../assets/css/bulma.min.css";
</style>