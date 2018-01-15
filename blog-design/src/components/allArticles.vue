<template>
  <div id="allArticles">
    <transition-group enter-active-class="animated fadeInLeft">
      <div class="article" v-for="article in articles" :key="article.title">
        <div class="title">
          <span ><router-link :to="'/article/' + article.id">{{article.title}}</router-link></span>
        </div>
        <div class="info row text-center">
          <div>
            <p>发表于: {{article.time}}</p>
            <i>|</i>
            <p>分类: <a href="">{{article.catelog}}</a></p>
          </div>
        </div>
        <div class="introduction">
          <span>{{article.introduction}}</span>
        </div>
        <div class="full">
          <router-link :to="'/article/' + article.id" id="fullStyle">
            <p>阅读全文</p>
            <i class="glyphicon glyphicon-chevron-right"></i>
          </router-link>  
        </div>
        <div class="underline"></div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  name: 'allArticles',
  watch: {
    '$route.params.id'() {
      var id = this.$route.params.id;
      this.axios.get('http://www.ding-blog.com/api/data/' + id).then((response) => {
        this.articles = response.data.data;
      })
    }
  },
  created() {
    var id = this.$route.params.id;
    this.axios.get('http://www.ding-blog.com/api/data/' + id).then((response) => {
      this.articles = response.data.data;
    })
  },
  data() {
    return {
      ding: 'hahahah',
      articles: ''
    }
  },

  methods: {

  }
}
</script>

<style scope>

.article {
  margin-top: 200px;
  margin-bottom: 250px;
}

.title {
  font-size: 6vmin;
  font-weight: lighter;
}

.title span a {
  color: #555;
  text-decoration: none;
  transition: all 0.3s;
}

.title span a:hover {
  background-color: black;
  color: white;
}


.info div p {
  display: inline-block;
  color: #999;
}

.info div i {
  margin: 0 10px;
  color: #999;
}

.info .created {
  right: 0;
}

.introduction {
  margin-top: 10%;
  font-size: 2vh;
  color: #555555;
  text-align: left;
  letter-spacing: 3px;
}

.full {
  position: relative;
  left: 50%;
  transform: translatex(-50%);
  margin-top: 8%;
  width: 130px;
  text-align: center;
  line-height: 20%;
  cursor:pointer;
  border: 2px solid black;
}

.full p {
  display: inline-block;
}

#fullStyle {
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px;
  padding-left: 15px;
  background-color: black;
  transition: all 0.5s;
  color: white;
}

#fullStyle:hover {
  background-color: white;
  color: black;
}

.underline {
  position: relative;
  border-bottom: 1px solid #5555;
  width: 10%;
  left: 50%;
  transform: translateX(-50%);
  margin-top: 1rem;
}

</style>