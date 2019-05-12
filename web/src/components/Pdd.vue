<template>
  <div class="hello">

    <pre>{{pdd}}</pre>

  </div>
</template>

<script>
import axios from 'axios'
// import Vue from vu


export default {
  data(){
    return {
      pdd:{}
    }
  },
  created() {
    axios.get('http://pdd.my/').then(response => {

      this.pdd = response.data;

    });

  }
}
</script>

<style>
</style>