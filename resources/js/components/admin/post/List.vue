<template>
    <div>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Post List</h3>

                    <div class="card-tools">
                        <router-link to="/add-post" class="btn btn-primary">Add New Post</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(post,index) in getallpost" :key="post.id">
                        <td>{{index+1}}</td>
                        <td v-if="post.user">{{post.user.name}}</td>
                        <td v-if="post.category">{{post.category.cat_name}}</td>
                        <td><img :src="postImagePath(post.post_photo)" width="70" height="50" alt=""/></td>
                        <td>{{post.post_title}}</td>
                        <td>{{post.post_des | sortlength(100, "...")}}</td>
                        <td>
                             <router-link class="btn btn-success" :to="`/edit-post/${post.id}`">Edit</router-link>
                            <button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button>
                        </td>
                    </tr>
                    
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
    </div>
</template>

<script>
export default {
    name: "List",
    mounted(){
        this.$store.dispatch("allpost")
    },
    computed: {
        getallpost(){
           return this.$store.getters.getPost
        }
    },
    methods: {
        postImagePath(img){
            return 'uploadimage/'+img;
        },
        deletePost(id){
            axios.get('/deletepost/'+id)
            .then(() => {
                this.$store.dispatch("allpost")
                Toast.fire({
                    icon: 'success',
                    title: 'Post Deleted successfully'
                    })
           })
           .catch(() => {

           })
        }
    }
}
</script>

<style scoped>

</style>