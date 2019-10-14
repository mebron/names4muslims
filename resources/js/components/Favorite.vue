<template>
    <span v-if="isBoy">
        <a class="btn btn-outline-success btn-sm" title="Remove" href="#" v-if="isFavorited" @click.prevent="unFavorite(name)">
            <i  class="fas fa-heart"></i> Favorited
        </a>
        <a class="btn btn-outline-primary btn-sm" title="Add to shortlist" href="#" v-else @click.prevent="favorite(name)">Add to <i  class="far fa-heart"></i></a>
    </span>
    <span v-else>
        <a class="btn btn-outline-success btn-sm" title="Remove" href="#" v-if="isFavorited" @click.prevent="unFavorite(name)">
            <i  class="fas fa-heart"></i> Favorited
        </a>
        <a class="btn btn-lpink btn-sm" title="Add to shortlist" href="#" v-else @click.prevent="favorite(name)">Add to <i  class="far fa-heart"></i></a>
    </span>
</template>

<script>
    export default {
        props: ['name', 'favorited', 'gender'],

        data: function() {
            return {
                isFavorited: '',
                isBoy: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
            this.isBoy = this.isBoys ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
            isBoys() {
            	return this.gender;
            },
            
        },

        methods: {
            favorite(name) {
                axios.post('/favorite/'+name)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(name) {
                axios.post('/unfavorite/'+name)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>