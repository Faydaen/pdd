<template>
    <div>

        <!--
            <pre>{{pdd}}</pre>
        -->

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
                    <button :class="answer.class" @click="say_answer(index)"
                            style="text-align: left; display: block; width: 100%" class="button">
                        {{ answer.text }}
                    </button>
                    <br>
                </template>

                <div class="spoilerLink" @click="toggleSpoiler">Информация</div>
                <div v-if="showSpoiler">
                    Информация
                </div>

            </div>
        </div>


    </div>
</template>

<script>
    import axios from 'axios'


    class question {

        constructor(question) {
            this.title = question.title;
            if (question.img) {
                this.img = 'http://pdd.my/img/' + question.img;
            } else {
                this.img = null;
            }

            this.answers = [];
            question.answers.forEach((answer, index) => {
                this.answers.push({
                    'text': answer,
                    'class': 'is-white', //is-danger is-white is-success
                    'is_right': (index === question.right_answer)
                })
            });
            this.comment = question.comment;
            this.tags = question.tags;
        }

        answer(my_answer) {
            this.answers = this.answers.map((answer, index) => {
                let cssClass = 'is-white';

                if (answer.is_right) {
                    cssClass = 'is-success'
                } else {
                    if (my_answer === index) {
                        cssClass = 'is-danger'
                    }
                }
                return {
                    text: answer.text,
                    is_right: answer.is_right,
                    class: cssClass
                }
            });
        }
    }

    export default {
        data() {
            return {
                pdd: {},
                showSpoiler:false,
            }
        },
        created() {
            axios.get('http://pdd.my/').then(response => {
                this.pdd = new question(response.data);
            });
        },
        methods: {
            say_answer(index) {
                this.pdd.answer(index)
            },
            toggleSpoiler(){
                this.showSpoiler = !this.showSpoiler;
            }
        }
    }
</script>

<style>
    @import "../assets/css/bulma.min.css";

    .spoilerLink {
        color: #7a77e6;
        cursor: pointer;
        border-bottom: dashed 1px #7a77e6;
        display: inline-block;
    }
</style>