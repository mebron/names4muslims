<!-- /resources/assets/js/components/RecentFavs.vue -->
<template>
  <div>  
        <div v-for="fav in kitty">          
            <span transition="fade"><a :href="'name/'+fav.slug+'.html'" v-text="fav.name" class="text-white"></a></span>
            </div>
    </div>
</template>

<style>
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
    background: green;
  }
  .fade-enter, .fade-leave-active {
    opacity: 0
  }
</style>

<script>
    export default {        
        data() {
            return {
                names: []
            }
        },
    created() {
        this.listenForChanges();
    },
    methods:  {

        listenForChanges(){
            Echo.channel('channel-favorite')
            .listen('FavoriteEvent', (e) => {
                this.names.push({
                name: e.fav.name,
                slug: e.fav.slug
                })
                
            });
        }        
    },
    computed: {
        kitty(){
            return this.names;
        }
    }


}
</script>