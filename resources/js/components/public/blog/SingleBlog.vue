<template>
    <span>
        <section id="inner-headline">
        <div class="container">
            <div class="row">
            <div class="span4">
                <div class="inner-heading">
                <h2>Post right sidebar</h2>
                </div>
            </div>
            <div class="span8">
                <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                <li class="active">Blog post right sidebar</li>
                </ul>
            </div>
            </div>
        </div>
        </section>
        <section id="content">
        <div class="container">
            <div class="row">
            <div class="span8">
                <article>
                <div class="row">
                    <div class="span8">
                    <div class="post-image">
                        <div class="post-heading">
                        <h3>{{singlepost.post_title}}</h3>
                        </div>
                         <img :src="`uploadimage/${singlepost.post_photo}`" :alt="`${singlepost.post_title}`" />
                    </div>
                    <p> {{singlepost.post_des}} </p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                        <li v-if="singlepost.user"><i class="icon-user"></i><a href="#"> {{singlepost.user.name}}</a></li>
                        <li v-if="singlepost.category"><i class="icon-folder-open"></i><a href="#"> {{singlepost.category.cat_name}}</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                </article>
                <!-- author info -->
                <div class="about-author">
                <a href="#" class="thumbnail align-left"><img src="assets/public/frontend/img/avatar.png" alt="" /></a>
                <h5><strong><a href="#">John doe</a></strong></h5>
                <p>
                    Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.
                </p>
                </div>
            
            </div>
            <BlogSidebar/>
            
            </div>
        </div>
        </section>
    </span>
</template>

<script>
import BlogSidebar from "./BlogSidebar.vue";
export default {
    name: "SingleBlog",
    components:{
        BlogSidebar
    },
    mounted(){
        this.$store.dispatch('getPostBySlug', this.$route.params.slug);
    },
    computed: {
       singlepost(){
           return this.$store.getters.singlepost
       }
    },
    methods: {
        

    }
}
</script>

<style scoped>

</style>