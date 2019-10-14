<template>
<div>
<input type="text" placeholder="Enter the name" v-model="query" v-on:keyup="autoComplete" class="form-control" list="names" name="name_id" autocomplete="off">
<datalist id="names" v-if="results.length">

<option v-for="result in results" :value="result.id">{{ result.name}}</option>

</datalist>
</div>
</template>

<script>
 export default{
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 2){
     axios.get('/api/search',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   }
  }
 }
</script>