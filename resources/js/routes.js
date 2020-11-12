import AdminHome from './components/admin/AdminHome.vue'
//for category
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'
//for post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'
//frontend
import PublicHome from './components/public/PublicHome.vue'
import SingleBlog from './components/public/blog/SingleBlog.vue'

export const routes = [
    {
        path: '/home',
        component: AdminHome
    },
    {
        path: '/category-list',
        component: CategoryList
    },
    {
        path: '/add-category',
        component: AddCategory
    },
    {
        path: '/edit-category/:categoryid',
        component: EditCategory
    },
    {
        path: '/post-list',
        component: PostList
    },
    {
        path: '/add-post',
        component: AddPost
    },
    {
        path: '/edit-post/:postid',
        component: EditPost
    },

    //frontend routes
    {
        path: '/',
        component: PublicHome
    },
    {
        path: '/:slug',
        component: SingleBlog
    }

  ]