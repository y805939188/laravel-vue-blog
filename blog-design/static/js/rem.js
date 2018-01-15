(function(doc, win) {
  // documentElement可以得到html元素和其中所有内容
  var docEl = doc.documentElement,
      // 看浏览器有哪个监听事件
    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
    recalc = function() {
      // 当浏览器窗口发生变化时 实时获取窗口的宽度
      var clientWidth = docEl.clientWidth;
      if(!clientWidth) {
        return;
      }
      // 设置根节点html元素的font—size大小
      docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
      //- console.log(docEl.style.fontSize)
    }

    if(!doc.addEventListener) {
      return;
    }

      // 当发生resizeEvt事件时 执行recalc函数
    win.addEventListener(resizeEvt, recalc, false) 
      // 当dom树构建完成触发？
    doc.addEventListener('DOMContentLoaded', recalc, false)
  })(document, window);