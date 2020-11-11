<template>
    <div>
        <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Post</h3>
                    </div>
                    <!-- /.card-header -->

                    <!--form start-->
                    <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="postId">Post Title</label>
                                <input type="text" name="post_title" class="form-control" id="postId" placeholder="Enter post title" v-model="form.post_title" :class="{ 'is-invalid': form.errors.has('post_title') }">
                                 <has-error :form="form" field="post_title"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="slugId">SEO Slug</label>
                                <input type="text" name="slug" class="form-control" id="slugId" placeholder="hello-world" v-model="form.slug" :class="{ 'is-invalid': form.errors.has('slug') }">
                                 <has-error :form="form" field="slug"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="descriptionId">Post Description</label>
                                <markdown-editor v-model="form.post_des"></markdown-editor>
                                <has-error :form="form" field="post_des"></has-error>
                            </div>

                            <div class="form-group">
                                <label for="descriptionId">Meta Description (Between 120 – 158 Characters)</label>
                                <textarea name="meta_des" class="form-control" v-model="form.meta_des" :class="{ 'is-invalid': form.errors.has('post_title') }" spellcheck="false"></textarea>
                                <has-error :form="form" field="meta_des"></has-error>
                            </div>

                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control" name="cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                                    <option disabled value="">Select One</option>
                                    <option v-for="category in getallCategory" :key="category.id" :value="category.id">{{category.cat_name}}</option>
                                </select>
                                 <has-error :form="form" field="cat_id"></has-error>
                            </div>

                            <div class="form-group">
                                <input @change="changePhoto($event)" type="file" name="post_photo" :class="{ 'is-invalid': form.errors.has('post_photo') }">
                                 <has-error :form="form" field="post_photo"></has-error>
                                 <img :src="updateImage()" alt="" width="80" height="80">
                            </div>
                            
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                        
                    </form>
                    <!--end start-->



                </div>
            </div>
            </div>
        </div>
        </section>
    
    </div>
</template>

<script>
export default {
    name: "Edit",
     data(){
        return {
      // Create a new form instance
      form: new Form({
        post_title: '',
        post_des: '',
        post_photo: '',
        cat_id: '',
        meta_des: '',
        slug: '',
        user_id: ''

      })
    }
    },
    mounted(){
        this.$store.dispatch("allcategory")
    },
    created() {
        axios.get(`post/${this.$route.params.postid}`)
                .then((res)=>{
                    console.log(res.data)
                    this.form.fill(res.data.post)
                })
    },
    computed: {
        getallCategory(){
           return this.$store.getters.getCategory
        }
    },
    methods: {
        changePhoto(event){
            let file = event.target.files[0];
            if(file.size > 1048576){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
                })
            }else{
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.post_photo = event.target.result
                };
                reader.readAsDataURL(file);
            }
            
        },
        updatePost(){
            this.form.post(`update-post/${this.$route.params.postid}`)
            .then(() => {
                this.$router.push('/post-list')
                Toast.fire({
                    icon: 'success',
                    title: 'Post Updated successfully'
                    })
            })
            .catch(() => {

            })
        },
        updateImage(){
            let img = this.form.post_photo
            if(img.length > 100){
                return this.form.post_photo
            }else{
                return `uploadimage/${this.form.post_photo}`
            }
        }
    }
}
</script>

<style scoped>

</style>