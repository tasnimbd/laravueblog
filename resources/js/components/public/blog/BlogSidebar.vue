<template>
    <span>
        <div class="span4">
            <aside class="right-sidebar">
            <div class="widget">
                <form class="form-search">
                <input @keyup="RealSearch" placeholder="Type something" type="text" v-model="keyword" class="input-medium search-query">
                <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                
                <ul class="cat">
                    <li v-for="category in getallcategory" :key="category.id">
                        <i class="icon-angle-right"></i><router-link :to="`/category/${category.cat_slug}`">{{category.cat_name}}</router-link><span> (20)</span>
                    </li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul v-for="(post, index) in latestBlogPost" :key="index" class="recent">
                <li v-if="index<5">
                    <img :src="`uploadimage/${post.post_photo}`" :alt="`${post.post_title}`" class="pull-left" style="width:65px!important;height:65px!important;"/>
                    <h6 style="margin:0px!important;"><router-link :to="`/${post.slug}`">{{post.post_title}}</router-link></h6>
                    <p>
                    Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                </li>
               
                </ul>
            </div>
            
            </aside>
        </div>
    </span>
</template>

<style scoped>

</style>

<script>
import _ from 'lodash'
export default {
    name: "BlogSidebar",
    data(){
        return{
            keyword: ''
        }
    },
    computed: {
        getallcategory(){
           return this.$store.getters.publiccategory
        },
        latestBlogPost(){
           return this.$store.getters.latestpost
        }
    },
    mounted(){
        this.$store.dispatch('getallpublicCategory')
        this.$store.dispatch("latestpost")
    },
    methods:{
        RealSearch:_.debounce(function() {
            this.$store.dispatch('searchPost', this.keyword)
        }, 1000)

    }
}
</script>