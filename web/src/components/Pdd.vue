<template>
    <div>

        <pre>{{pdd}}</pre>
        <br>
        <br>
        <br>

        <div class="container">
            <div class="notification">
                <strong>{{pdd.title}}</strong>

                <div v-if="pdd.img">
                    <img :src="pdd.img" alt="">
                </div>

                <br>
                <br>

                <template v-for="(answer, index)  in pdd.answers">
                    <button @click="say_answer(index)" style="text-align: left; display: block; width: 100%" class="button">
                        {{ answer.text }}
                    </button>
                    <br>
                </template>

            </div>
        </div>


    </div>
</template>

<script>
    import axios from 'axios'


    class question {

        constructor(question) {
            this.title = question.title;
            if (question.img){
                this.img = 'http://pdd.my/img/'+question.img;
            }
            else {
                this.img = null;
            }

            this.answers = [];
            question.answers.forEach((answer, index)=>{
                this.answers.push({
                    'text':answer,
                    'class': 'is-white', //is-danger is-white is-success
                    'is_right': (index === question.right_answer)
                })
            });
            this.comment = question.comment;
            this.tags = question.tags;
        }



    }

    export default {
        data() {
            return {
                pdd: {}
            }
        },
        created() {
            axios.get('http://pdd.my/').then(response => {
                this.pdd = new question(response.data);
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