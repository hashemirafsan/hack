import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

/*
Hackthon Directory
 */
import HackthonApp from './hackathonApp.vue'


export default new VueRouter({
    
    routes: [
        {
        	path: '/',
        	name: 'default',
        	component: HackthonApp,
        }
    ]
})