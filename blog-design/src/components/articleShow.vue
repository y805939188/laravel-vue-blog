<template>
  <div id="articleShow">
    <!-- <button class="btn btn-default" @click="dianji">click</button> -->
    <div class="article">
      <div class="title">
        <span>{{articleContent.title}}</span>
      </div>
      <div class="info row text-center">
        <div>
          <p>发表于: {{articleContent.created_at}}</p>
          <i>|</i>
          <p>分类: <a href="">{{articleContent.catelog}}</a></p>
        </div>
      </div>
      <div class="articleContent">
        <p>{{articleContent.content}}</p>
      </div>
      <div class="underline"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'articleContent',
  mounted() {
    this.axios.get('http://www.ding-blog.com/api/article/' + this.$route.params.articleid).then((res) => {
      this.articleContent = res.data;
    })
  },
  data() {
    return {
      articleContent: ''
    }
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

.title span {
  color: #555;
  text-decoration: none;
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

.articleContent {
  margin-top: 10%;
  font-size: 2vh;
  color: #555555;
  text-align: left;
  letter-spacing: 2px;
}




</style>