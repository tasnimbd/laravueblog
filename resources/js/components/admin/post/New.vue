<template>
    <div>
        <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Post</h3>
                    </div>
                    <!-- /.card-header -->

                    <!--form start-->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="postId">Post Title</label>
                                <input type="text" name="post_title" class="form-control" id="postId" placeholder="Enter post title" v-model="form.post_title" :class="{ 'is-invalid': form.errors.has('post_title') }">
                                 <has-error :form="form" field="post_title"></has-error>
                            </div>
                            
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  @click.prevent="addPost()">Save</button>
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
    name: "New",
     data(){
        return {
      // Create a new form instance
      form: new Form({
        post_title: ''
      })
    }
    },
    mounted(){

    },
    computed: {

    },
    methods: {

    }
}
</script>

<style scoped>

</style>