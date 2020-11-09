<template>
    <div>
        <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
            <div class="col-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>

                    </div>
                    <!-- /.card-header -->

                    <!--form start-->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoryId">Category Name</label>
                                <input type="text" name="cat_name" class="form-control" id="categoryId" placeholder="enter category name" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                                 <has-error :form="form" field="cat_name"></has-error>
                            </div>
                            
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  @click.prevent="updateCategory()">Update</button>
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
    mounted(){
        axios.get(`/editcategory/${this.$route.params.categoryid}`)
        .then((res) => {
            this.form.fill(res.data.category)
        })
    },
    data(){
        return {
      // Create a new form instance
      form: new Form({
        cat_name: ''
      })
    }
    },
    methods: {
        updateCategory(){
           this.form.post(`/update-category/${this.$route.params.categoryid}`)
           .then((res) => {
               this.$router.push('/category-list')
               Toast.fire({
                icon: 'success',
                title: 'Category Updated successfully'
                })
           })
        }
    }
}
</script>

<style scoped>

</style>