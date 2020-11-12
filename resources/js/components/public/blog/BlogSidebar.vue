<template>
    <span>
        <div class="span4">
            <aside class="right-sidebar">
            <div class="widget">
                <form class="form-search">
                <input placeholder="Type something" type="text" class="input-medium search-query">
                <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                
                <ul class="cat">
                <li v-for="category in getallcategory" :key="category.id"><i class="icon-angle-right"></i><a href="#">{{category.cat_name}}</a><span> (20)</span></li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                <li>
                    <img src="assets/public/frontend/img/dummies/blog/65x65/thumb1.jpg" class="pull-left" alt="" />
                    <h6><a href="#">Lorem ipsum dolor sit</a></h6>
                    <p>
                    Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                </li>
                <li>
                    <a href="#"><img src="assets/public/frontend/img/dummies/blog/65x65/thumb2.jpg" class="pull-left" alt="" /></a>
                    <h6><a href="#">Maiorum ponderum eum</a></h6>
                    <p>
                    Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                </li>
                <li>
                    <a href="#"><img src="assets/public/frontend/img/dummies/blog/65x65/thumb3.jpg" class="pull-left" alt="" /></a>
                    <h6><a href="#">Et mei iusto dolorum</a></h6>
                    <p>
                    Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                </li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                <li><a href="#">Web design</a></li>
                <li><a href="#">Trends</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Internet</a></li>
                <li><a href="#">Tutorial</a></li>
                <li><a href="#">Development</a></li>
                </ul>
            </div>
            </aside>
        </div>
    </span>
</template>

<style scoped>

</style>

<script>
export default {
    name: "BlogSidebar",
    computed: {
        getallcategory(){
           return this.$store.getters.publiccategory
        }
    },
    mounted(){
        this.$store.dispatch('getallpublicCategory')
    }
}
</script>