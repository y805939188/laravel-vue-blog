import Vue from 'vue'
import Router from 'vue-router'
import allArticles from '@/components/allArticles'
import articleShow from '@/components/articleShow'
import allCatelogs from '@/components/allCatelogs'
import catelogShow from '@/components/catelogShow'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/', 
      redirect: '/page/1'
    },
    {
      path: '/page/:id',
      component: allArticles
    },
    {
      path: '/article/:articleid',
      component: articleShow
    },
    {
      path: '/catelog',
      component: allCatelogs
    },
    {
      path: '/catelog/:id',
      component: catelogShow
    }
  ]
})
