<template>
  <div class="myContent">
    <div id="myContent" class="clearfix">
      <div class="col-sm-6 col-sm-offset-3">
        <div id="myTitle" class="text-center">
          <div>
            <i class="glyphicon glyphicon-asterisk inline"></i>
            <h3 class="inline">Shin的博客</h3>
          </div>
        </div>
        <div>
          <nav class="navbar navbar-default">
            <div class="navbar-header">
              <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div id="myNav" class="collapse navbar-collapse text-center">
              <ul id="childFloat" class="nav navbar-nav">
                <li>
                  <i class="glyphicon glyphicon-list-alt"></i>
                  <div>
                    <router-link to="/">文章</router-link>
                  </div>
                </li>
                <li>
                  <i class="glyphicon glyphicon-list"></i>
                  <div>
                    <router-link to="/catelog">分类</router-link>
                  </div>
                </li>
                <li>
                  <i class="glyphicon glyphicon-user"></i>
                  <div>
                    <router-link to="/myInfo">我</router-link>
                  </div>
                </li>
                <li>
                  <i class="glyphicon glyphicon-tags"></i>
                  <div>
                    <router-link to="/tag">标签</router-link>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <router-view class="text-center"></router-view>
        <div class="paginate text-center" v-if="ifPaginate">
          <ul class="list-unstyled list-inline">
            <li v-for="v in pageNum" :key="v" ><router-link :to="'/page/' + v" class="btn btn-default" :class="{active:v===$route.params.id}">{{v}}</router-link></li>
          </ul>
        </div>
        <footer class="footer">
          <div class="footer-wrapper">
            <div class="item item1">
              <span class="year">2018-</span>
              <span class="glyphicon glyphicon-star-empty"></span>
              <span class="name">Shin</span>
            </div>
            <div class="item item2">
              <span class="weChat"><span class="glyphicon glyphicon-envelope"></span>y805939188@163.com</span>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'myContent',
  watch: {
    "$route"() {
      var pathName = this.$route.fullPath.slice(0, 5);
      if(pathName === '/page') {
        this.ifPaginate = true;
      }else {
        this.ifPaginate = false;
      }
      var mainH = $('main').height() + 10 + 'px';
      $.scrollTo(mainH, 500);
    }
  },
  created() {
    var pathName = this.$route.fullPath.slice(0, 5);
    if(pathName === '/page') {
      this.ifPaginate = true;
    }else {
      this.ifPaginate = false;
    }
  },
  mounted() {
    this.axios.get('http://www.ding-blog.com/api/data/total').then((Response) => {
      this.articlesTotal = Response.data.total;
      this.showNum = Response.data.showNum;
    })
  },
  data () {
    return {
      articlesTotal: 0,
      showNum: 1,
      ifPaginate: true
    }
  },

  computed: {
    pageNum() {
      return Math.ceil(this.articlesTotal / this.showNum);
    }
  },

  methods: {
    
  } 
}
</script>

<style scoped>

#myTitle {
  width: 50%;
  left: 50%;
  transform: translateX(50%);
  padding: 2px 0px;
  background-color: black;
  color: white;
  text-align: center;
  border-radius: 0 30px 0 30px;
}

#myNav .navbar-nav {
  margin: 25px 0;
}

.inline {
  display: inline-block;
}

h3 {
  margin-top: 10px;
}

.navbar-default {
  background-color: transparent;
  border: transparent;
}

#childFloat {
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}

#childFloat li {
  text-align: center;
  margin: 0 12px;
  color: black;
  transition: all 1s;
  padding-bottom: 0px;
  margin-bottom: 20px;
  border-bottom: 1px solid transparent;
  transition: border-color 0.2s ease-in-out;
}

#childFloat li:hover {
  border-bottom: 1px solid black;
}

#childFloat li a {
  color: black;
  text-decoration:none;
}

.footer {
  margin-top: 20%;
}

.footer .item span {
  margin: 5px 10px;
  font-size: 1.5vmin;
}

.footer .item {
  text-align: center;
  color: #999;
}


</style>
