(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-ef12ddb4"],{"35f6":function(e,t,r){},4395:function(e,t,r){},"5eb8":function(e,t,r){"use strict";r("4395")},9035:function(e,t,r){"use strict";r("35f6")},fa76:function(e,t,r){"use strict";r.r(t);var c=r("7a23"),n={class:"projects-index"},o=Object(c["createTextVNode"])("A Graph Might go Here"),a={class:"filters"},i=Object(c["createTextVNode"])("Create New Project"),l={class:"grid"};function s(e,t,r,s,u,d){var p=Object(c["resolveComponent"])("PageHead"),f=Object(c["resolveComponent"])("filter-bar"),j=Object(c["resolveComponent"])("router-link"),b=Object(c["resolveComponent"])("project-card");return Object(c["openBlock"])(),Object(c["createBlock"])("div",n,[Object(c["createVNode"])(p,{title:"Ongoing Projects",subtitle:d.pageSubtitle},{default:Object(c["withCtx"])((function(){return[o]})),_:1},8,["subtitle"]),Object(c["createVNode"])("div",a,[Object(c["createVNode"])(f,{onUpdate:d.filterProjects},null,8,["onUpdate"]),Object(c["createVNode"])(j,{to:"/projects/create",class:"btn btn-default"},{default:Object(c["withCtx"])((function(){return[i]})),_:1})]),Object(c["createVNode"])("section",l,[(Object(c["openBlock"])(!0),Object(c["createBlock"])(c["Fragment"],null,Object(c["renderList"])(e.projects,(function(e,t){return Object(c["openBlock"])(),Object(c["createBlock"])(b,{key:t,project:e},null,8,["project"])})),128))])])}r("96cf");var u=r("1da1"),d=r("5530"),p=r("5502"),f=r("009a"),j=r("4a6a"),b=(r("b0c0"),{class:"filter-bar"}),m={class:"form-item"},O=Object(c["createVNode"])("label",{for:"name"},"Name",-1);function h(e,t,r,n,o,a){var i=Object(c["resolveComponent"])("autocomplete");return Object(c["openBlock"])(),Object(c["createBlock"])("div",b,[Object(c["createVNode"])("div",m,[O,Object(c["withDirectives"])(Object(c["createVNode"])("input",{type:"text",id:"name","onUpdate:modelValue":t[1]||(t[1]=function(e){return o.name=e}),placeholder:"Search by Project Name",onKeyup:t[2]||(t[2]=function(){return a.filterByName&&a.filterByName.apply(a,arguments)}),autocomplete:"off"},null,544),[[c["vModelText"],o.name]])]),Object(c["createVNode"])(i,{label:"Client",url:"api/clients",filterKey:"client",searchKey:"name",onSelected:a.addFilter},null,8,["onSelected"]),Object(c["createVNode"])(i,{label:"Project Lead",url:"api/users/project-leads",filterKey:"projectLead",searchKey:"name",onSelected:a.addFilter},null,8,["onSelected"])])}r("c740"),r("4160"),r("159b");var v=r("1b5b"),k={name:"FilterBar",components:{Autocomplete:v["a"]},data:function(){return{name:"",meta:null,filters:[],keyupTimeout:null}},methods:{filterByName:function(){var e=this;clearTimeout(this.keyupTimeout),this.keyupTimeout=setTimeout((function(){e.addFilter({key:"name",value:self.name})}),500)},addFilter:function(e){var t=this.filters.findIndex((function(t){return t.key===e.key}));-1!==t?this.filters[t].value=e.value:this.filters.push(e),this.filterResults()},filterResults:function(){var e=this;return Object(u["a"])(regeneratorRuntime.mark((function t(){var r,c;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.$store.commit("util/enableLoader"),r=[],e.filters.forEach((function(e){e.value.hasOwnProperty("id")?r[e.key]=e.value.id:r[e.key]=e.value})),console.log(r),t.next=6,e.$api("api/projects/filter","GET",r);case 6:c=t.sent,e.$emit("update",c.data),e.$store.commit("util/disableLoader");case 9:case"end":return t.stop()}}),t)})))()}}};r("9035");k.render=h;var y=k,N={name:"ProjectsIndex",components:{FilterBar:y,ProjectCard:f["a"],PageHead:j["a"]},data:function(){return{filteredResults:[]}},computed:Object(d["a"])(Object(d["a"])({},Object(p["c"])({projects:"projects/getAllProjects"})),{},{pageSubtitle:function(){return"There are currently ".concat(this.projects.length," in the pipeline")}}),mounted:function(){var e=this;return Object(u["a"])(regeneratorRuntime.mark((function t(){var r;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.$store.commit("util/enableLoader"),t.next=3,e.$api("api/projects","GET");case 3:r=t.sent,e.$store.commit("projects/setProjects",r.data),e.$store.commit("util/disableLoader");case 6:case"end":return t.stop()}}),t)})))()},methods:{filterProjects:function(e){this.$store.commit("projects/setProjects",e)}}};r("5eb8");N.render=s;t["default"]=N}}]);
//# sourceMappingURL=chunk-ef12ddb4.07658bb3.js.map