import Axios from "axios"

export default {
    state: {
        category: [],
        post:[]
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getPost(state) {
            return state.post
        }
    },
    actions: {
        allcategory(context){
            axios.get('/category')
            .then((res)=>{
                context.commit('categories', res.data.categories)
            })
        },
        allpost(context){
            axios.get('/post')
            .then((res)=>{
                context.commit('posts', res.data.posts)
            })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },
        posts(state, data) {
            return state.post = data
        }
    }
}