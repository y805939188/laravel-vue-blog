<template>
  <div id="app">
    <main style="overflow: hidden;position: fixed;">
			<div class="segmenter" style="background-image: url(../static/img/gakki44.jpg)"></div>
			<h2 class="trigger-headline trigger-headline--hidden animated zoomIn">
				<span>Hi I'm Shin</span>
			</h2>
		</main>
    <div id="wrapper" class="">
      <myFilter id="myFilter"></myFilter>
      <myContent id="myContent"></myContent>
    </div>
  </div>
</template>

<script>

import myContent from './components/myContent.vue';
import myFilter from './components/myFilter.vue';

export default {
  name: 'app',
  components: {
    myFilter,
    myContent
  }
}
</script>

<style>
body {
  background-color: white;
  color: black;
}

#wrapper {
  position: relative;
  padding-left: 0;
  padding-right: 0;
}

#myFilter {
  box-shadow: 0px -15px 30px 15px white;
  width: 100%;
  height: 50px;
  background: white;
}

#myContent {
  /* width: 100%; */
  background-color: white;
  color: black;
}
</style>
