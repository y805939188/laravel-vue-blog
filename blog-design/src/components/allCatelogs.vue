<template>
  <div id="allCatelog">
    <div class="wrapper">
      <transition-group enter-active-class="animated fadeInLeft">
        <div class="catelogContent" v-for="catelog in catelogs" :key="catelog.title">
          <router-link :to="'/catelog/' + catelog.id">
            <span>{{catelog.title}}</span>
            <span>({{catelog.articles_num}})</span>
          </router-link>
        </div>
      </transition-group>
    </div>
  </div>
</template>

<script>
export default {
  name: 'app',

  data() {
    return {
      ding: 'hahaha',
      catelogs: ''
    }
  },
  created() {

  },
  mounted() {
    this.axios.get("http://www.ding-blog.com/api/catelog").then((res) => {
      this.catelogs = res.data;
    })
  },
  computed: {

  },
  methods: {

  },
  components: {

  }

}
</script>

<style>

.wrapper {
  margin: 2rem 2rem 4rem 2rem;
}

.wrapper div,span {
  display: inline-block;
}

.wrapper .catelogContent a {
  text-decoration: none;
  color: black;
  display: block;
  width: 100%;
  height: 100%;
  padding: 0.05rem 0.2rem;
  transition: all 0.5s;
  border-radius: 10px;
}

.wrapper .catelogContent {
  margin: 10px 20px;
  border: 1px solid #d3d3d3;
  border-radius: 10px;
  cursor:pointer;
}

.wrapper .catelogContent a:hover {
  background-color: black;
  color: white;
}

</style>