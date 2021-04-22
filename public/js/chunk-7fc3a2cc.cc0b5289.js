(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7fc3a2cc"],{"2abf":function(e,t,c){},"2b8d":function(e,t,c){},"2f02":function(e,t,c){"use strict";c("2abf")},"35c3":function(e,t,c){"use strict";c("96d1")},"96d1":function(e,t,c){},b777:function(e,t,c){"use strict";c("2b8d")},f331:function(e,t,c){"use strict";c.r(t);var n=c("7a23"),r={class:"clients-index"},a={key:0},i={class:"filters"},o=Object(n["createTextVNode"])("Add New Client"),l={class:"grid"},s={key:1,class:"no-clients"},u=Object(n["createVNode"])("h2",{class:"no-clients__title"},"No clients have been setup!",-1),d=Object(n["createVNode"])("p",{class:"no-clients__message"},"Create your first now!",-1),b=Object(n["createTextVNode"])("Add a Client");function f(e,t,c,f,p,m){var j=Object(n["resolveComponent"])("PageHead"),O=Object(n["resolveComponent"])("client-filters"),h=Object(n["resolveComponent"])("router-link"),v=Object(n["resolveComponent"])("client-card");return Object(n["openBlock"])(),Object(n["createBlock"])("div",r,[Object(n["createVNode"])(j,{title:"Clients",subtitle:m.pageSubtitle},null,8,["subtitle"]),e.hasClients?(Object(n["openBlock"])(),Object(n["createBlock"])("div",a,[Object(n["createVNode"])("div",i,[Object(n["createVNode"])(O,{onUpdate:m.updateClients},null,8,["onUpdate"]),Object(n["createVNode"])(h,{to:"/clients/create",class:"btn btn-default"},{default:Object(n["withCtx"])((function(){return[o]})),_:1})]),Object(n["createVNode"])("section",l,[(Object(n["openBlock"])(!0),Object(n["createBlock"])(n["Fragment"],null,Object(n["renderList"])(p.clients,(function(e,t){return Object(n["openBlock"])(),Object(n["createBlock"])(v,{key:t,client:e},null,8,["client"])})),128))])])):(Object(n["openBlock"])(),Object(n["createBlock"])("section",s,[u,d,Object(n["createVNode"])(h,{to:"/clients/create",class:"btn btn-default"},{default:Object(n["withCtx"])((function(){return[b]})),_:1})]))])}c("96cf");var p=c("1da1"),m=c("5530"),j=c("4a6a"),O=(c("b0c0"),{class:"client-card"}),h={class:"client-card__body"},v={class:"client-card__client"},k={key:1,class:"client-card__logo logo-placeholder"},g={class:"client-card__content"},y={class:"client-card__name"},N={class:"client-card__subtitle"};function C(e,t,c,r,a,i){var o=Object(n["resolveComponent"])("router-link");return Object(n["openBlock"])(),Object(n["createBlock"])("article",O,[Object(n["createVNode"])(o,{to:i.clientUrl},{default:Object(n["withCtx"])((function(){return[Object(n["createVNode"])("div",h,[Object(n["createVNode"])("div",v,[i.clientLogo?(Object(n["openBlock"])(),Object(n["createBlock"])("img",{key:0,src:i.clientLogo,alt:i.clientLogoAlt,class:"client-card__logo"},null,8,["src","alt"])):(Object(n["openBlock"])(),Object(n["createBlock"])("span",k))]),Object(n["createVNode"])("div",g,[Object(n["createVNode"])("h2",y,Object(n["toDisplayString"])(c.client.name),1),Object(n["createVNode"])("span",N,Object(n["toDisplayString"])(c.client.totalNumberProject)+" projects in the pipeline",1)])])]})),_:1},8,["to"])])}var B={name:"ProjectCard",computed:{client:function(){return this.client.client},state:function(){return this.client.state.state},clientUrl:function(){return"/clients/".concat(this.client.id)},clientLogo:function(){return"http://app.svara.io:8000/".concat(this.client.logoPath)},clientLogoAlt:function(){return"Logo for ".concat(this.client.name)}},props:{client:{type:Object,required:!0}}};c("35c3");B.render=C;var V=B,_={class:"filter-bar"},w={class:"form-item"},x=Object(n["createVNode"])("label",{for:"name"},"Name",-1);function T(e,t,c,r,a,i){var o=Object(n["resolveComponent"])("autocomplete");return Object(n["openBlock"])(),Object(n["createBlock"])("div",_,[Object(n["createVNode"])("div",w,[x,Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"text",id:"name","onUpdate:modelValue":t[1]||(t[1]=function(e){return a.name=e}),placeholder:"Search by Client Name",onKeyup:t[2]||(t[2]=function(){return i.filterByName&&i.filterByName.apply(i,arguments)}),autocomplete:"off"},null,544),[[n["vModelText"],a.name]])]),Object(n["createVNode"])(o,{label:"Account Manager",url:"api/users/account-managers",filterKey:"accountManager",searchKey:"name",onSelected:i.addFilter},null,8,["onSelected"])])}c("c740"),c("4160"),c("159b");var L=c("1b5b"),S={name:"ClientFilters",components:{Autocomplete:L["a"]},data:function(){return{name:"",meta:null,filters:[],keyupTimeout:null}},methods:{filterByName:function(){var e=this;clearTimeout(this.keyupTimeout),this.keyupTimeout=setTimeout((function(){e.addFilter({key:"name",value:e.name})}),500)},addFilter:function(e){var t=this.filters.findIndex((function(t){return t.key===e.key}));-1!==t?this.filters[t].value=e.value:this.filters.push(e),this.filterResults()},filterResults:function(){var e=this;return Object(p["a"])(regeneratorRuntime.mark((function t(){var c,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.$store.commit("util/enableLoader"),c=[],e.filters.forEach((function(e){e.value.hasOwnProperty("id")?c[e.key]=e.value.id:c[e.key]=e.value})),t.next=5,e.$api("api/clients/filter","GET",c);case 5:n=t.sent,e.$emit("update",n.data),e.$store.commit("util/disableLoader");case 8:case"end":return t.stop()}}),t)})))()}}};c("b777");S.render=T;var P=S,$=c("5502"),A={name:"ClientsIndex",components:{ClientCard:V,PageHead:j["a"],ClientFilters:P},data:function(){return{clients:[]}},computed:Object(m["a"])(Object(m["a"])({},Object($["c"])({searchTerm:"clients/getSearchTerm"})),{},{pageSubtitle:function(){return"Your currently have ".concat(this.clients.length," clients")},hasProjects:function(){return this.clients.length>0}}),mounted:function(){var e=this;return Object(p["a"])(regeneratorRuntime.mark((function t(){var c;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.$store.commit("util/enableLoader"),t.next=3,e.$api("api/clients","GET");case 3:c=t.sent,e.clients=c.data,e.$store.commit("util/disableLoader");case 6:case"end":return t.stop()}}),t)})))()},methods:{updateClients:function(e){this.clients=e}}};c("2f02");A.render=f;t["default"]=A}}]);
//# sourceMappingURL=chunk-7fc3a2cc.cc0b5289.js.map