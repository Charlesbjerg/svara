(function(e){function t(t){for(var a,c,i=t[0],s=t[1],u=t[2],d=0,l=[];d<i.length;d++)c=i[d],Object.prototype.hasOwnProperty.call(r,c)&&r[c]&&l.push(r[c][0]),r[c]=0;for(a in s)Object.prototype.hasOwnProperty.call(s,a)&&(e[a]=s[a]);f&&f(t);while(l.length)l.shift()();return o.push.apply(o,u||[]),n()}function n(){for(var e,t=0;t<o.length;t++){for(var n=o[t],a=!0,c=1;c<n.length;c++){var i=n[c];0!==r[i]&&(a=!1)}a&&(o.splice(t--,1),e=s(s.s=n[0]))}return e}var a={},c={app:0},r={app:0},o=[];function i(e){return s.p+"js/"+({}[e]||e)+"."+{"chunk-12a5554c":"725a1df6","chunk-2d222587":"6a7bc2c0","chunk-33e58673":"7418165e","chunk-552c1c1a":"a25dfec4","chunk-0df3528c":"20a9006d","chunk-63579f6d":"4f9649ee","chunk-76448f16":"97270a47","chunk-5ff24154":"99e5d4ad","chunk-628b9e94":"7f099bfb","chunk-2afb78f6":"8d25bc1f","chunk-0f1678c1":"70ea6611","chunk-445aa30e":"e8caead1","chunk-d5d5b90e":"18f67cec","chunk-1ca2edb4":"7b053f60","chunk-fea2942e":"168933c7","chunk-3d467ccd":"5ee95458","chunk-32b6e8b8":"d89a7099","chunk-2d0ba0fa":"e0a36c35","chunk-2d22d835":"66525bd8","chunk-607f0793":"e6cc5075"}[e]+".js"}function s(t){if(a[t])return a[t].exports;var n=a[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,s),n.l=!0,n.exports}s.e=function(e){var t=[],n={"chunk-12a5554c":1,"chunk-33e58673":1,"chunk-552c1c1a":1,"chunk-0df3528c":1,"chunk-63579f6d":1,"chunk-76448f16":1,"chunk-5ff24154":1,"chunk-628b9e94":1,"chunk-2afb78f6":1,"chunk-0f1678c1":1,"chunk-445aa30e":1,"chunk-d5d5b90e":1,"chunk-1ca2edb4":1,"chunk-fea2942e":1,"chunk-3d467ccd":1,"chunk-32b6e8b8":1,"chunk-607f0793":1};c[e]?t.push(c[e]):0!==c[e]&&n[e]&&t.push(c[e]=new Promise((function(t,n){for(var a="css/"+({}[e]||e)+"."+{"chunk-12a5554c":"87fa5c34","chunk-2d222587":"31d6cfe0","chunk-33e58673":"c7eb949e","chunk-552c1c1a":"053a3237","chunk-0df3528c":"f9c8ecc6","chunk-63579f6d":"20c45ced","chunk-76448f16":"2aa2c726","chunk-5ff24154":"61f010fa","chunk-628b9e94":"2d864473","chunk-2afb78f6":"3a89d189","chunk-0f1678c1":"6a0ec76b","chunk-445aa30e":"895bc3e5","chunk-d5d5b90e":"a3a723d2","chunk-1ca2edb4":"d14caced","chunk-fea2942e":"146e067b","chunk-3d467ccd":"ee79a00f","chunk-32b6e8b8":"677482be","chunk-2d0ba0fa":"31d6cfe0","chunk-2d22d835":"31d6cfe0","chunk-607f0793":"d5b1f13c"}[e]+".css",r=s.p+a,o=document.getElementsByTagName("link"),i=0;i<o.length;i++){var u=o[i],d=u.getAttribute("data-href")||u.getAttribute("href");if("stylesheet"===u.rel&&(d===a||d===r))return t()}var l=document.getElementsByTagName("style");for(i=0;i<l.length;i++){u=l[i],d=u.getAttribute("data-href");if(d===a||d===r)return t()}var f=document.createElement("link");f.rel="stylesheet",f.type="text/css",f.onload=t,f.onerror=function(t){var a=t&&t.target&&t.target.src||r,o=new Error("Loading CSS chunk "+e+" failed.\n("+a+")");o.code="CSS_CHUNK_LOAD_FAILED",o.request=a,delete c[e],f.parentNode.removeChild(f),n(o)},f.href=r;var h=document.getElementsByTagName("head")[0];h.appendChild(f)})).then((function(){c[e]=0})));var a=r[e];if(0!==a)if(a)t.push(a[2]);else{var o=new Promise((function(t,n){a=r[e]=[t,n]}));t.push(a[2]=o);var u,d=document.createElement("script");d.charset="utf-8",d.timeout=120,s.nc&&d.setAttribute("nonce",s.nc),d.src=i(e);var l=new Error;u=function(t){d.onerror=d.onload=null,clearTimeout(f);var n=r[e];if(0!==n){if(n){var a=t&&("load"===t.type?"missing":t.type),c=t&&t.target&&t.target.src;l.message="Loading chunk "+e+" failed.\n("+a+": "+c+")",l.name="ChunkLoadError",l.type=a,l.request=c,n[1](l)}r[e]=void 0}};var f=setTimeout((function(){u({type:"timeout",target:d})}),12e4);d.onerror=d.onload=u,document.head.appendChild(d)}return Promise.all(t)},s.m=e,s.c=a,s.d=function(e,t,n){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},s.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(s.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)s.d(n,a,function(t){return e[t]}.bind(null,a));return n},s.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="/",s.oe=function(e){throw console.error(e),e};var u=window["webpackJsonp"]=window["webpackJsonp"]||[],d=u.push.bind(u);u.push=t,u=u.slice();for(var l=0;l<u.length;l++)t(u[l]);var f=d;o.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"068d":function(e,t,n){},"151e":function(e,t,n){},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var a=n("7a23"),c={class:"app"},r={key:1},o=Object(a["createVNode"])("div",null,null,-1);function i(e,t,n,i,s,u){var d=Object(a["resolveComponent"])("Navigation"),l=Object(a["resolveComponent"])("router-view"),f=Object(a["resolveComponent"])("Notification"),h=Object(a["resolveComponent"])("Loader");return Object(a["openBlock"])(),Object(a["createBlock"])("div",c,[s.appLoaded?(Object(a["openBlock"])(),Object(a["createBlock"])(d,{key:0})):(Object(a["openBlock"])(),Object(a["createBlock"])("div",r,[o])),Object(a["createVNode"])("main",{class:["app-view",u.isLoginView]},[Object(a["createVNode"])(l,{class:"view"},{default:Object(a["withCtx"])((function(e){return[Object(a["createVNode"])(a["Transition"],{name:"custom-transition","enter-active-class":"animate__animated animate__fadeInLeft","leave-active-class":"animate__animated animate__fadeOutLeft",mode:"out-in"},{default:Object(a["withCtx"])((function(){return[(Object(a["openBlock"])(),Object(a["createBlock"])(Object(a["resolveDynamicComponent"])(e.Component)))]})),_:2},1024)]})),_:1}),e.notification?(Object(a["openBlock"])(),Object(a["createBlock"])(f,{key:0,message:e.notification,type:e.type},null,8,["message","type"])):Object(a["createCommentVNode"])("",!0),Object(a["createVNode"])(h)],2)])}n("b0c0"),n("96cf");var s=n("1da1"),u=n("5530"),d=Object(a["withScopeId"])("data-v-72172542");Object(a["pushScopeId"])("data-v-72172542");var l={class:"nav"},f=Object(a["createVNode"])("div",{class:"nav__logo"},[Object(a["createVNode"])("svg",{id:"Group_84","data-name":"Group 84",xmlns:"http://www.w3.org/2000/svg","xmlns:xlink":"http://www.w3.org/1999/xlink",viewBox:"0 0 490.396 490.398"},[Object(a["createVNode"])("defs",null,[Object(a["createVNode"])("linearGradient",{id:"linear-gradient",x1:"0.237",y1:"1.472",x2:"1.53",y2:"0.818",gradientUnits:"objectBoundingBox"},[Object(a["createVNode"])("stop",{offset:"0","stop-color":"#8515db"}),Object(a["createVNode"])("stop",{offset:"1","stop-color":"#d201fa"})])]),Object(a["createVNode"])("g",{id:"Group_62","data-name":"Group 62"},[Object(a["createVNode"])("path",{id:"Path_110","data-name":"Path 110",d:"M136.182,191.393,64.744,315.139H207.626Zm75.5,107.125V217.75l-60.6-24.2Zm0,110.529v-82.1h-47.4ZM126.87,183.889,68.153,160.445l36.124,62.57Zm16.945-29.347H85.24l47.6,19Zm206.12,0H291.36l10.972,19ZM217.588,50.395,145.133,175.9H290.042Z",transform:"translate(27.61 10.361)",fill:"url(#linear-gradient)"}),Object(a["createVNode"])("path",{id:"Path_111","data-name":"Path 111",d:"M268,22.806c-135.42,0-245.2,109.778-245.2,245.2S132.583,513.2,268,513.2,513.2,403.425,513.2,268,403.424,22.806,268,22.806ZM436.2,351.254a5.908,5.908,0,0,1-5.117,8.862h-96.13L273.114,467.224a5.908,5.908,0,0,1-10.233,0L201.056,360.116h-96.13a5.908,5.908,0,0,1-5.123-8.862L147.868,268,99.8,184.755a5.908,5.908,0,0,1,5.117-8.863H201.05L262.887,68.785c2.109-3.657,8.124-3.657,10.233,0l61.837,107.108h96.13a5.909,5.909,0,0,1,5.117,8.863L388.133,268Z",transform:"translate(-22.806 -22.806)",fill:"url(#linear-gradient)"}),Object(a["createVNode"])("path",{id:"Path_112","data-name":"Path 112",d:"M274.348,162.944l36.13-62.576-58.729,23.445ZM171,255.056H313.881L242.443,131.322Zm-4.053-16.614,60.6-104.969-60.6,24.195ZM111.785,127.636,161.037,147.3l49.252-19.669Zm55.161,221.335,47.4-82.092h-47.4Z",transform:"translate(84.16 70.437)",fill:"url(#linear-gradient)"})])])],-1),h={class:"nav__links"},p=Object(a["createVNode"])("svg",{xmlns:"http://www.w3.org/2000/svg",width:"25",height:"23.28",viewBox:"0 0 25 23.28",class:"nav__link-icon"},[Object(a["createVNode"])("g",{id:"home-icon-silhouette",transform:"translate(0 -17.047)"},[Object(a["createVNode"])("g",{id:"Group_15","data-name":"Group 15",transform:"translate(0.001 17.047)"},[Object(a["createVNode"])("g",{id:"Group_14","data-name":"Group 14",transform:"translate(0 0)"},[Object(a["createVNode"])("path",{id:"Path_40","data-name":"Path 40",d:"M24.581,27.927l-3.789-3.919V19.482a1.434,1.434,0,1,0-2.866,0v1.563l-2.821-2.918a3.68,3.68,0,0,0-5.211,0L.42,27.927a1.519,1.519,0,0,0,0,2.1,1.4,1.4,0,0,0,2.027,0l9.473-9.8a.826.826,0,0,1,1.159,0l9.474,9.8a1.4,1.4,0,0,0,2.027,0A1.518,1.518,0,0,0,24.581,27.927Z",transform:"translate(-0.001 -17.047)",fill:"#06062c"}),Object(a["createVNode"])("path",{id:"Path_41","data-name":"Path 41",d:"M78.036,127.961a.672.672,0,0,0-.982,0l-8.224,8.616a.748.748,0,0,0-.2.515v6.284a2.611,2.611,0,0,0,2.548,2.67h4.072v-6.608h4.6v6.608h4.072a2.611,2.611,0,0,0,2.548-2.67v-6.284a.745.745,0,0,0-.2-.515Z",transform:"translate(-65.045 -122.767)",fill:"#06062c"})])])])],-1),b=Object(a["createTextVNode"])(" Home "),m=Object(a["createVNode"])("svg",{id:"jigsaw",xmlns:"http://www.w3.org/2000/svg",width:"25",height:"25",viewBox:"0 0 25 25",class:"nav__link-icon"},[Object(a["createVNode"])("path",{id:"Path_42","data-name":"Path 42",d:"M182.921,5.219a1.046,1.046,0,1,0,0,2.091h3.429v4.744h3.236V10.193a2.539,2.539,0,0,1,5.079,0v1.861h3.648V3.6a3.6,3.6,0,0,0-3.6-3.6H186.35V5.187Z",transform:"translate(-173.313)"}),Object(a["createVNode"])("path",{id:"Path_43","data-name":"Path 43",d:"M278.571,184.747a1.046,1.046,0,1,0-2.091,0V188.1h-4.73v3.111h1.861a2.539,2.539,0,0,1,0,5.079H271.75v3.756h8.366a3.6,3.6,0,0,0,3.6-3.6V188.1h-5.142Z",transform:"translate(-258.713 -175.048)"}),Object(a["createVNode"])("path",{id:"Path_44","data-name":"Path 44",d:"M4.978,15.483a1.046,1.046,0,1,0,2.091,0V12.054h4.968V8.8H10.1a2.539,2.539,0,0,1,0-5.079l1.94-.018V0H3.6A3.6,3.6,0,0,0,0,3.6v8.457H4.947Z",transform:"translate(0 0)"}),Object(a["createVNode"])("path",{id:"Path_45","data-name":"Path 45",d:"M15.392,278.772a1.046,1.046,0,1,0,0-2.091H12.037v-4.6H8.563v1.936a2.539,2.539,0,0,1-5.079,0l-.018-1.94H0v8.349a3.6,3.6,0,0,0,3.6,3.6h8.44v-5.25Z",transform:"translate(0 -259.022)"})],-1),g=Object(a["createTextVNode"])(" Projects "),j=Object(a["createVNode"])("svg",{class:"nav__link-icon",id:"bold","enable-background":"new 0 0 24 24",height:"25",viewBox:"0 0 24 24",width:"25",xmlns:"http://www.w3.org/2000/svg"},[Object(a["createVNode"])("path",{d:"m15 6.5c-.552 0-1-.448-1-1v-1.5h-4v1.5c0 .552-.448 1-1 1s-1-.448-1-1v-1.5c0-1.103.897-2 2-2h4c1.103 0 2 .897 2 2v1.5c0 .552-.448 1-1 1z"}),Object(a["createVNode"])("path",{d:"m12.71 15.38c-.18.07-.44.12-.71.12s-.53-.05-.77-.14l-11.23-3.74v7.63c0 1.52 1.23 2.75 2.75 2.75h18.5c1.52 0 2.75-1.23 2.75-2.75v-7.63z"}),Object(a["createVNode"])("path",{d:"m24 7.75v2.29l-11.76 3.92c-.08.03-.16.04-.24.04s-.16-.01-.24-.04l-11.76-3.92v-2.29c0-1.52 1.23-2.75 2.75-2.75h18.5c1.52 0 2.75 1.23 2.75 2.75z"})],-1),k=Object(a["createTextVNode"])(" Clients "),v=Object(a["createVNode"])("svg",{xmlns:"http://www.w3.org/2000/svg",width:"25",height:"20.783",viewBox:"0 0 25 20.783",class:"nav__link-icon"},[Object(a["createVNode"])("g",{id:"group",transform:"translate(0 -38.84)"},[Object(a["createVNode"])("g",{id:"Group_17","data-name":"Group 17",transform:"translate(19.569 50.06)"},[Object(a["createVNode"])("g",{id:"Group_16","data-name":"Group 16"},[Object(a["createVNode"])("path",{id:"Path_46","data-name":"Path 46",d:"M400.389,273.32h-1.895a4.929,4.929,0,0,1,.3,1.694v7.161a2.112,2.112,0,0,1-.122.707H401.8a2.124,2.124,0,0,0,2.122-2.122v-3.9A3.541,3.541,0,0,0,400.389,273.32Z",transform:"translate(-398.494 -273.32)"})])]),Object(a["createVNode"])("g",{id:"Group_19","data-name":"Group 19",transform:"translate(0 50.06)"},[Object(a["createVNode"])("g",{id:"Group_18","data-name":"Group 18"},[Object(a["createVNode"])("path",{id:"Path_47","data-name":"Path 47",d:"M5.133,275.015a4.928,4.928,0,0,1,.3-1.694H3.537A3.541,3.541,0,0,0,0,276.858v3.9a2.124,2.124,0,0,0,2.122,2.122H5.254a2.112,2.112,0,0,1-.122-.707Z",transform:"translate(0 -273.321)"})])]),Object(a["createVNode"])("g",{id:"Group_21","data-name":"Group 21",transform:"translate(6.797 48.218)"},[Object(a["createVNode"])("g",{id:"Group_20","data-name":"Group 20",transform:"translate(0 0)"},[Object(a["createVNode"])("path",{id:"Path_48","data-name":"Path 48",d:"M144.7,234.815h-4.332a3.541,3.541,0,0,0-3.537,3.537v7.161a.707.707,0,0,0,.707.707h9.99a.707.707,0,0,0,.707-.707v-7.161A3.541,3.541,0,0,0,144.7,234.815Z",transform:"translate(-136.829 -234.815)"})])]),Object(a["createVNode"])("g",{id:"Group_23","data-name":"Group 23",transform:"translate(8.247 38.84)"},[Object(a["createVNode"])("g",{id:"Group_22","data-name":"Group 22",transform:"translate(0 0)"},[Object(a["createVNode"])("path",{id:"Path_49","data-name":"Path 49",d:"M171.367,38.84a4.253,4.253,0,1,0,4.253,4.253A4.258,4.258,0,0,0,171.367,38.84Z",transform:"translate(-167.114 -38.84)"})])]),Object(a["createVNode"])("g",{id:"Group_25","data-name":"Group 25",transform:"translate(1.6 42.804)"},[Object(a["createVNode"])("g",{id:"Group_24","data-name":"Group 24"},[Object(a["createVNode"])("path",{id:"Path_50","data-name":"Path 50",d:"M36.624,121.689A3.179,3.179,0,1,0,39.8,124.87,3.185,3.185,0,0,0,36.624,121.689Z",transform:"translate(-33.443 -121.689)"})])]),Object(a["createVNode"])("g",{id:"Group_27","data-name":"Group 27",transform:"translate(17.038 42.804)"},[Object(a["createVNode"])("g",{id:"Group_26","data-name":"Group 26"},[Object(a["createVNode"])("path",{id:"Path_51","data-name":"Path 51",d:"M348.788,121.689a3.181,3.181,0,1,0,3.181,3.181A3.185,3.185,0,0,0,348.788,121.689Z",transform:"translate(-345.607 -121.689)"})])])])],-1),O=Object(a["createTextVNode"])(" Teams "),w=Object(a["createVNode"])("svg",{xmlns:"http://www.w3.org/2000/svg",width:"25",height:"25.009",viewBox:"0 0 25 25.009",class:"nav__link-icon"},[Object(a["createVNode"])("g",{id:"business-and-trade",transform:"translate(0 -0.178)"},[Object(a["createVNode"])("path",{id:"Path_29","data-name":"Path 29",d:"M13.68,1.954,2.142.2A1.861,1.861,0,0,0,.651.611,1.877,1.877,0,0,0,0,2.017v22.12a1.053,1.053,0,0,0,1.05,1.05H4.462V19.676A1.833,1.833,0,0,1,6.3,17.839H8.924a1.833,1.833,0,0,1,1.837,1.837v5.512h4.462V3.771A1.838,1.838,0,0,0,13.68,1.954ZM5.774,15.476H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,0,1,0,1.575Zm0-3.15H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,1,1,0,1.575Zm0-3.15H4.2A.787.787,0,1,1,4.2,7.6H5.774a.787.787,0,0,1,0,1.575Zm0-3.15H4.2a.787.787,0,1,1,0-1.575H5.774a.787.787,0,1,1,0,1.575Zm5.249,9.449H9.449a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H9.449a.787.787,0,1,1,0-1.575h1.575a.787.787,0,1,1,0,1.575Zm0-3.15H9.449a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H9.449a.787.787,0,1,1,0-1.575h1.575a.787.787,0,1,1,0,1.575Z",transform:"translate(0 0)"}),Object(a["createVNode"])("path",{id:"Path_30","data-name":"Path 30",d:"M22.975,10.916,15.5,9.351V24.73h7.086a1.839,1.839,0,0,0,1.837-1.837V12.712A1.828,1.828,0,0,0,22.975,10.916ZM20.487,21.581H18.912a.787.787,0,0,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H18.912a.787.787,0,1,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Zm0-3.15H18.912a.787.787,0,1,1,0-1.575h1.575a.787.787,0,0,1,0,1.575Z",transform:"translate(0.576 0.457)"})])],-1),N=Object(a["createTextVNode"])(" Company "),P={class:"nav__profile"},_={key:0,class:"user"},V=Object(a["createVNode"])("div",{class:"user__avatar"},null,-1),y={class:"user__name"},C={class:"user__role"};Object(a["popScopeId"])();var x=d((function(e,t,n,c,r,o){var i=Object(a["resolveComponent"])("router-link");return Object(a["openBlock"])(),Object(a["createBlock"])("div",l,[f,Object(a["createVNode"])("nav",h,[e.userLoggedIn?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:0,to:"/dashboard",class:"nav__link"},{default:d((function(){return[p,b]})),_:1})):Object(a["createCommentVNode"])("",!0),o.canAccess(["staff","manager","owner"])?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:1,to:"/projects",class:"nav__link"},{default:d((function(){return[m,g]})),_:1})):Object(a["createCommentVNode"])("",!0),o.canAccess(["staff","manager","owner"])?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:2,to:"/clients",class:"nav__link"},{default:d((function(){return[j,k]})),_:1})):Object(a["createCommentVNode"])("",!0),o.canAccess(["staff","manager","owner"])?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:3,to:"/teams",class:"nav__link"},{default:d((function(){return[v,O]})),_:1})):Object(a["createCommentVNode"])("",!0),o.canAccess(["owner"])?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:4,to:"/company",class:"nav__link"},{default:d((function(){return[w,N]})),_:1})):Object(a["createCommentVNode"])("",!0)]),e.userLoggedIn?(Object(a["openBlock"])(),Object(a["createBlock"])("button",{key:0,onClick:t[1]||(t[1]=function(){return o.logout&&o.logout.apply(o,arguments)}),class:"nav__link nav__link--logout"},"Logout")):Object(a["createCommentVNode"])("",!0),Object(a["createVNode"])("footer",P,[e.userLoggedIn&&e.user?(Object(a["openBlock"])(),Object(a["createBlock"])("div",_,[V,Object(a["createVNode"])("strong",y,Object(a["toDisplayString"])(e.user.name),1),Object(a["createVNode"])("p",C,Object(a["toDisplayString"])(e.user.jobRole),1)])):Object(a["createCommentVNode"])("",!0)])])})),T=(n("7db0"),n("5502")),B={name:"Navigation.vue",computed:Object(u["a"])({},Object(T["c"])({user:"auth/getUser",userLoggedIn:"auth/isUserAuthenticated"})),data:function(){return{types:[{key:0,label:"staff"},{key:1,label:"manager"},{key:2,label:"owner"},{key:3,label:"client"}]}},methods:{canAccess:function(e){var t=this,n=this.types.find((function(e){return e.key===t.user.typeId})),a=[];return void 0!==n&&(a=e.find((function(e){return e===n.label}))),void 0!==a&&a.length>0},logout:function(){var e=this;return Object(s["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/logout","POST");case 2:n=t.sent,n.data.success&&(e.$router.push("/login"),e.$store.commit("auth/unsetUser"));case 4:case"end":return t.stop()}}),t)})))()}}};n("f15a");B.render=x,B.__scopeId="data-v-72172542";var M=B,L={class:"popup-notif__inner"},S={class:"popup-notif__message"};function G(e,t,n,c,r,o){return Object(a["openBlock"])(),Object(a["createBlock"])("aside",{class:["popup-notif",o.typeClass],ref:"notif"},[Object(a["createVNode"])("div",L,[Object(a["createVNode"])("i",{class:e.iconClass},null,2),Object(a["createVNode"])("p",S,Object(a["toDisplayString"])(n.message),1)])],2)}var H={name:"Notification.vue",props:{message:{type:String,required:!0},type:{type:String,required:!1,default:"info"}},computed:{typeClass:function(){return"popup-notif--".concat(this.type)}},mounted:function(){var e=this;this.$nextTick((function(){e.$refs.notif.classList.add("active"),e.autoClose()}))},methods:{autoClose:function(){var e=this;setTimeout((function(){e.$refs.notif.classList.remove("active"),e.$store.commit("util/unsetGlobalNotif")}),1e4)}}};n("bc3e");H.render=G;var A=H,Z=Object(a["withScopeId"])("data-v-7655224a");Object(a["pushScopeId"])("data-v-7655224a");var I=Object(a["createVNode"])("div",{class:"spinner"},[Object(a["createVNode"])("div",{class:"dot1"}),Object(a["createVNode"])("div",{class:"dot2"})],-1);Object(a["popScopeId"])();var $=Z((function(e,t,n,c,r,o){return Object(a["openBlock"])(),Object(a["createBlock"])("div",{class:o.loaderClasses},[I],2)})),E={name:"Loader",computed:{showLoader:function(){return this.$store.getters["util/getLoaderState"]},loaderClasses:function(){return this.showLoader?"loader loader--active":"loader"}}};n("6d14");E.render=$,E.__scopeId="data-v-7655224a";var U=E,D={name:"App",components:{Navigation:M,Notification:A,Loader:U},data:function(){return{token:"",transitionName:"",appLoaded:!1}},computed:Object(u["a"])(Object(u["a"])({},Object(T["c"])({notification:"util/getNotification",type:"util/getNotificationType",isAuth:"auth/isUserAuthenticated"})),{},{isLoginView:function(){return"login"===this.$route.name?"app-view--login":""}}),mounted:function(){var e=this;return Object(s["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("sanctum/csrf-cookie","GET");case 2:return window.csrfCookie=t.sent,t.next=5,e.$api("api/auth/user","GET");case 5:if(n=t.sent,"Error"!==n.status){t.next=11;break}return t.next=9,e.$router.push("/login");case 9:t.next=12;break;case 11:e.$store.commit("auth/setUser",n.data.user);case 12:e.appLoaded=!0;case 13:case"end":return t.stop()}}),t)})))()}};n("bf40");D.render=i;var R=D,q=(n("99af"),n("d3b7"),n("2909")),z=n("6c02"),F=(n("b64b"),function(){return{user:{}}}),J={isUserAuthenticated:function(e){return 0!==Object.keys(e.user).length},getUser:function(e){return e.user}},K={},Y={setUser:function(e,t){e.user=t},unsetUser:function(e){e.user={}}},Q={namespaced:!0,state:F,getters:J,actions:K,mutations:Y},W=function(){return{globalNotifMessage:"",globalNotifType:"",globalShowLoader:!1}},X={getLoaderState:function(e){return e.globalShowLoader},getNotification:function(e){return e.globalNotifMessage},getNotificationType:function(e){return e.globalNotifType}},ee={},te={setGlobalNotif:function(e,t){var n=t.message,a=t.type;e.globalNotifMessage=n,e.globalNotifType=a},unsetGlobalNotif:function(e){e.globalNotifMessage=null,e.globalNotifType=null},enableLoader:function(e){e.globalShowLoader=!0},disableLoader:function(e){e.globalShowLoader=!1}},ne={namespaced:!0,state:W,getters:X,actions:ee,mutations:te},ae=(n("4fad"),n("3835")),ce=function(){return{projects:[],currentProject:{messageThreads:[],documents:[]},currentStep:0,entityModalActive:!1,entityModalSection:null,newProject:{newPipeline:!1,usingTemplate:!1,staff:[],pipeline:[]}}},re={getAllProjects:function(e){return e.projects},getCurrentProject:function(e){return e.currentProject},getCurrentStep:function(e){return e.currentStep},getNewProject:function(e){return e.newProject},getCurrentPhase:function(e){return e.currentProject.pipeline.find((function(t){return t.id===e.currentProject.currentPhaseId}))}},oe={},ie={setProjects:function(e,t){e.projects=t},setCurrentProject:function(e,t){e.currentProject=t},setCurrentStep:function(e,t){e.currentStep=t},addNewProjectData:function(e,t){for(var n=0,a=Object.entries(t);n<a.length;n++){var c=Object(ae["a"])(a[n],2),r=c[0],o=c[1];e.newProject[r]=o}},addProjectLead:function(e,t){e.newProject.staff.push(t),console.log(t,e.newProject.staff)},addNewProjectStaff:function(e,t){e.newProject.staff.concat(t)},newProjectNewPipeline:function(e){e.newProject.usingTemplate=!1,e.newProject.newPipeline=!0},newProjectUsingTemplate:function(e){e.newProject.newPipeline=!1,e.newProject.usingTemplate=!0},openEntityModal:function(e,t){e.entityModalActive=!0,e.entityModalSection=t},closeEntityModal:function(e){e.entityModalActive=!1,e.entityModalSection=null},addPipelineToProject:function(e,t){e.newProject.pipeline=t},setProjectPipeline:function(e,t){e.currentProject.pipeline=t},setSelectedThread:function(e,t){e.currentProject.selectedThread=t},addMessageToCurrentThread:function(e,t){e.currentProject.selectedThread.messages.push(t)},addNewThread:function(e,t){e.currentProject.messageThreads.push(t)},setProjectDocuments:function(e,t){e.currentProject.documents=t}},se={namespaced:!0,state:ce,getters:re,actions:oe,mutations:ie},ue=function(){return{clients:[],currentClient:{},searchTerm:""}},de={getAllClients:function(e){return e.clients},getCurrentClient:function(e){return e.currentClient},getSearchTerm:function(e){return e.searchTerm}},le={},fe={setClients:function(e,t){e.clients=t},setCurrentClient:function(e,t){e.currentClient=t},setSearchTerm:function(e,t){e.searchTerm=t}},he={namespaced:!0,state:ue,getters:de,actions:le,mutations:fe},pe=(n("c740"),function(){return{board:{openCard:null,data:{}},checklist:{selected:null},signOff:{},documents:{}}}),be={},me={},ge={setEntityData:function(e,t){var n=t.entityType,a=t.data;e[n]=a},setOpenCard:function(e,t){e.board.openCard=t},closeCardModal:function(e){e.board.openCard=null},setBoardData:function(e,t){e.board.data=t},updateColumn:function(e,t){e.board.data.columns.cards=t},setSelectedChecklist:function(e,t){e.checklist.selected=t},unsetSelectedChecklist:function(e){e.checklist.selected=!1},updateBlankChecklistItem:function(e,t){var n=e.checklist.selected.items.findIndex((function(e){return void 0===e.id}));e.checklist.selected.items[n]=t},updateChecklistItem:function(e,t){var n=e.checklist.selected.items.findIndex((function(e){return e.id===t.id}));e.checklist.selected.items[n]=t},createBlankTemplate:function(e){e.signOff.selected={name:"",message:""}},updateTemplate:function(e,t){e.signOff.selected=t}},je={namespaced:!0,state:pe,getters:be,actions:me,mutations:ge},ke=Object(T["b"])({modules:{auth:Q,util:ne,projects:se,clients:he,entities:je}}),ve={class:"home"};function Oe(e,t,n,c,r,o){return Object(a["openBlock"])(),Object(a["createBlock"])("div",ve," Homepage ")}var we={name:"Home"};we.render=Oe;var Ne=we,Pe=[{path:"/projects",name:"projects",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-33e58673"),n.e("chunk-552c1c1a"),n.e("chunk-0df3528c")]).then(n.bind(null,"fa76"))}},{path:"/projects/:id",name:"projects.single",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-d5d5b90e"),n.e("chunk-32b6e8b8")]).then(n.bind(null,"13a5"))}},{path:"/projects/create",name:"projects.create",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-628b9e94"),n.e("chunk-3d467ccd")]).then(n.bind(null,"9272"))}},{path:"/projects/edit/:id",name:"projects.edit",component:function(){return n.e("chunk-2d22d835").then(n.bind(null,"f88e"))}},{path:"/projects/entity/:id",name:"projects.entity",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-628b9e94"),n.e("chunk-2afb78f6"),n.e("chunk-d5d5b90e"),n.e("chunk-1ca2edb4")]).then(n.bind(null,"fb25"))}}],_e=[{path:"/teams",name:"All Teams",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-628b9e94"),n.e("chunk-2afb78f6"),n.e("chunk-d5d5b90e"),n.e("chunk-fea2942e")]).then(n.bind(null,"d3ec"))}}],Ve=[{path:"/clients",name:"All Clients",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-552c1c1a"),n.e("chunk-76448f16")]).then(n.bind(null,"f331"))}},{path:"/clients/:id",name:"View Client",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-628b9e94"),n.e("chunk-2afb78f6"),n.e("chunk-0f1678c1")]).then(n.bind(null,"e017"))}},{path:"/clients/create",name:"Create Client",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-5ff24154")]).then(n.bind(null,"72b4"))}},{path:"/clients/edit/:id",name:"Edit Client",component:function(){return n.e("chunk-2d0ba0fa").then(n.bind(null,"3634"))}}],ye=[{path:"/company",name:"Company",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-628b9e94"),n.e("chunk-2afb78f6"),n.e("chunk-445aa30e")]).then(n.bind(null,"28b1"))}}],Ce=[{path:"/",name:"Home",component:Ne},{path:"/dashboard",name:"Dashboard",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-33e58673"),n.e("chunk-63579f6d")]).then(n.bind(null,"7277"))}},{path:"/login",name:"Login",component:function(){return n.e("chunk-607f0793").then(n.bind(null,"a55b"))}},{path:"/activate/:key",name:"Activate",component:function(){return Promise.all([n.e("chunk-12a5554c"),n.e("chunk-2d222587")]).then(n.bind(null,"cde5"))}}].concat(Object(q["a"])(Pe),Object(q["a"])(Ve),Object(q["a"])(_e),Object(q["a"])(ye)),xe=Object(z["a"])({history:Object(z["b"])("/"),routes:Ce});xe.beforeRouteUpdate=function(e,t,n){ke.getters["auth/isUserAuthenticated"]||"Login"===e.name?n():n({name:"Login"})};var Te=xe,Be=(n("07ac"),n("53ca")),Me=n("bc3a"),Le=n.n(Me),Se={install:function(e,t){e.config.globalProperties.$api=function(){var t=Object(s["a"])(regeneratorRuntime.mark((function t(n){var a,c,r,o,i,s,u,d,l,f,h,p=arguments;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(a=p.length>1&&void 0!==p[1]?p[1]:"GET",c=p.length>2&&void 0!==p[2]?p[2]:[],r=":1024",o="http://app.svara.io".concat(r,"/").concat(n),i={},t.prev=5,s="","GET"===a&&"object"===Object(Be["a"])(c)&&Object.values(c).length>0)for(u=0,d=Object.entries(c);u<d.length;u++)l=Object(ae["a"])(d[u],2),f=l[0],h=l[1],s+=""!==s?"&".concat(f,"=").concat(h):"?".concat(f,"=").concat(h);return t.next=10,Le()({method:a,url:"".concat(o).concat(s),data:c});case 10:i=t.sent,t.next=36;break;case 13:if(t.prev=13,t.t0=t["catch"](5),i.status="Error",i.data=t.t0.response.data,500!==t.t0.response.status){t.next=21;break}i.message=t.t0.response.data,t.next=36;break;case 21:if(401!==t.t0.response.status){t.next=27;break}return t.next=24,e.config.globalProperties.$router.push("/login");case 24:i.message=t.t0.response.data,t.next=36;break;case 27:if(403!==t.t0.response.status){t.next=36;break}if(i.message=t.t0.response.data.message,e.config.globalProperties.$store.commit("util/setGlobalNotif",{message:i.message,type:"error"}),!(e.config.globalProperties.$router.length>1)){t.next=34;break}e.config.globalProperties.$router.go(-1),t.next=36;break;case 34:return t.next=36,e.config.globalProperties.$router.push("/dashboard");case 36:return t.abrupt("return",i);case 37:case"end":return t.stop()}}),t,null,[[5,13]])})));return function(e){return t.apply(this,arguments)}}()}},Ge={install:function(e,t){e.config.globalProperties.$dateFormatter=function(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],n=new Date(e),a="".concat(n.getDate(),"/").concat(n.getMonth()+1,"/").concat(n.getFullYear());return t&&(a+=" - ".concat(n.getHours(),":").concat(n.getMinutes())),a}}},He=Object(a["createApp"])(R);He.use(ke),He.use(Te),He.use(Se),He.use(Ge),He.mount("#app")},"6d14":function(e,t,n){"use strict";n("151e")},"98b1":function(e,t,n){},bc3e:function(e,t,n){"use strict";n("f597")},bf40:function(e,t,n){"use strict";n("068d")},f15a:function(e,t,n){"use strict";n("98b1")},f597:function(e,t,n){}});
//# sourceMappingURL=app.c7e2fc34.js.map