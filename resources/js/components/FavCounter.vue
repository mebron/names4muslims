<template>
<span>{{ counts }}</span>
</template>

<script>
export default {
	
	data: function(){
		return{
		counts: []
		}
	},

	created: function(){
	bus.$on('fav', (msg) => {
      this.getCounts();
    });
    this.getCounts();
    },

	methods: {
		getCounts: function(){
		axios.get('/get-counts').then(response => {
      	this.counts = response.data;
      
		});
		}
	}
}
</script>