<template>
    <div>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>

                    <div class="card-tools">
                        <router-link to="/add-category" class="btn btn-primary">Add Category</router-link>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(category,index) in getallCategory" :key="category.id">
                        <td>{{index+1}}</td>
                        <td>{{category.cat_name}}</td>
                        <td>{{category.created_at | timeformat}}</td>
                        <td>
                            <router-link class="btn btn-success" :to="`/edit-category/${category.id}`">Edit</router-link>
                            <button class="btn btn-danger" @click.prevent="deletecategory(category.id)">Delete</button>
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
         this.$store.dispatch("allcategory")
    },
    computed: {
        getallCategory(){
           return this.$store.getters.getCategory
        }
    },
    methods: {
        deletecategory(id){
            axios.get('/category/'+id)
            .then(() => {
                this.$store.dispatch("allcategory")
                Toast.fire({
                    icon: 'success',
                    title: 'Category Deleted successfully'
                    })
           })
           .catch(() => {
               Toast.fire({
                    icon: 'fail',
                    title: 'Something Went Wrong'
                    })
           })
        }
    }
}
</script>

<style scoped>

</style>