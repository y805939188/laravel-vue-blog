<template>
  <div id="catelogShow">
    
      <div class="catelogWrapper">
        <div class="catelogTitle clearfix">
          <span class="pull-left">{{catelog.catelog_title}}</span>
        </div>
        <div class="catelogArticle">
          <ul class="list-unstyled">
            <transition-group enter-active-class="animated fadeInLeft">
              <li v-for="article in catelogArticles" :key="article.title"><router-link :to="'/article/' + article.id"> <span class="time">{{article.created_at | created_time}}</span> <span class="articletitle">{{article.title}}</span> </router-link></li>
            </transition-group>
          </ul>
        </div>
      </div>
    
  </div>
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
      catelog: '',
      catelogArticles: ''
    }
  },
  mounted() {
    this.axios.get('http://www.ding-blog.com/api/catelog/' + this.$route.params.id).then((res) => {
      this.catelog = res.data;
      this.catelogArticles = this.catelog.articles;
    })
  }
}
</script>

<style>

.catelogTitle {
  position: relative;
  padding-left: 20px;
  font-size: 24px;
  margin-bottom: 1rem;
}

.catelogTitle::before {
  content: " ";
  position: absolute;
  left: 0;
  top: 50%;
  margin-left: -4px;
  margin-top: -4px;
  width: 8px;
  height: 8px;
  background: #bbb;
  border-radius: 50%;
}

.catelogArticle ul li {
  position: relative;
  text-align: left;
  padding-left: 15px;
  padding-bottom: 5px;
  font-size: 18px;
  margin-bottom: 6vmin;
  border-bottom: 1px dashed #bbb;
  transition: all 0.5s;
}

.catelogArticle ul li:hover {
  border-bottom: 1px dashed black;
}

.catelogArticle ul li:hover::before {
  background: black;
}

.catelogArticle ul li a {
  text-decoration: none;
  color: rgb(95, 93, 93);
}

.catelogArticle ul li::before {
  content: " ";
  position: absolute;
  left: 0;
  top: 50%;
  margin-left: -4px;
  margin-top: -4px;
  width: 8px;
  height: 8px;
  background: #bbb;
  border-radius: 50%;
  transition: all 0.5s;
}

</style>