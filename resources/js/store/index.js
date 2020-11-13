import Axios from "axios"

export default {
    state: {
        category: [],
        post:[],
        blogpost:[],
        singlepost:[],
        publiccategory:[],
        latestpost:[]

    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getPost(state) {
            return state.post
        },
        getblogPost(state) {
            return state.blogpost
        },
        singlepost(state){
            return state.singlepost
        },
        publiccategory(state){
            return state.publiccategory
        },
        latestpost(state){
            return state.latestpost
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
        },
        allblogpost(context){
            axios.get('/blogpost')
            .then((res)=>{
                context.commit('blogposts', res.data.posts)
            })
        },
        getPostBySlug(context,payload){
            axios.get(payload)
            .then((res) => {
                context.commit('signlePost', res.data.post)
            })
        },
        getallpublicCategory(context){
            axios.get('/categories')
            .then((res)=>{
                context.commit('publiccategories', res.data.categories)
            })
        },
        getPostByCatId(context,payload){
            axios.get('/categorypost/'+payload)
            .then((res) => {
                context.commit('getPostByCatId', res.data.posts)
            })
        },
        searchPost(context,payload){
            axios.get('search?s='+payload)
            .then((res) => {
                context.commit('getSearchPost', res.data.posts)
            })
        },
        latestpost(context){
            axios.get('/latestpost')
            .then((res)=>{
                context.commit('latestpost', res.data.posts)
            })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },
        posts(state, data) {
            return state.post = data
        },
        blogposts(state, data) {
            return state.blogpost = data
        },
        signlePost(state, payload) {
            return state.singlepost = payload
        },
        publiccategories(state, payload) {
            return state.publiccategory = payload
        },
        getPostByCatId(state, data) {
            return state.blogpost = data
        },
        getSearchPost(state, payload){
            return state.blogpost = payload
        },
        latestpost(state, data) {
            return state.latestpost = data
        },


    }
}