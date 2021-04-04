(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2aca36c8"],{"3bd2":function(e,t,c){"use strict";c("4cf3")},"4aa0":function(e,t,c){"use strict";c("8ccc")},"4cf3":function(e,t,c){},"8ccc":function(e,t,c){},b117:function(e,t,c){},de75:function(e,t,c){"use strict";c("b117")},f331:function(e,t,c){"use strict";c.r(t);var n=c("7a23"),r={class:"clients-index"},a={class:"filters"},i={class:"grid"};function o(e,t,c,o,l,s){var u=Object(n["resolveComponent"])("PageHead"),d=Object(n["resolveComponent"])("client-filters"),b=Object(n["resolveComponent"])("client-card");return Object(n["openBlock"])(),Object(n["createBlock"])("div",r,[Object(n["createVNode"])(u,{title:"Clients",subtitle:s.pageSubtitle},null,8,["subtitle"]),Object(n["createVNode"])("div",a,[Object(n["createVNode"])(d)]),Object(n["createVNode"])("section",i,[(Object(n["openBlock"])(!0),Object(n["createBlock"])(n["Fragment"],null,Object(n["renderList"])(e.clients,(function(e,t){return Object(n["openBlock"])(),Object(n["createBlock"])(b,{key:t,client:e},null,8,["client"])})),128))])])}c("96cf");var l=c("1da1"),s=c("5530"),u=c("4a6a"),d=(c("b0c0"),{class:"client-card"}),b={class:"client-card__body"},p=Object(n["createVNode"])("div",{class:"client-card__client"},[Object(n["createVNode"])("span",{class:"client-card__logo logo-placeholder"})],-1),f={class:"client-card__content"},m={class:"client-card__name"},j={class:"client-card__subtitle"};function O(e,t,c,r,a,i){var o=Object(n["resolveComponent"])("router-link");return Object(n["openBlock"])(),Object(n["createBlock"])("article",d,[Object(n["createVNode"])(o,{to:i.clientUrl},{default:Object(n["withCtx"])((function(){return[Object(n["createVNode"])("div",b,[p,Object(n["createVNode"])("div",f,[Object(n["createVNode"])("h2",m,Object(n["toDisplayString"])(c.client.name),1),Object(n["createVNode"])("span",j,Object(n["toDisplayString"])(c.client.totalNumberProject)+" projects in the pipeline",1)])])]})),_:1},8,["to"])])}var v={name:"ProjectCard",computed:{client:function(){return this.client.client},state:function(){return this.client.state.state},clientUrl:function(){return"/clients/".concat(this.client.id)},clientClientLogo:function(){return"http://app.svara.io:8000/".concat(this.client.client.logoPath)},clientClientLogoAlt:function(){return"Logo for ".concat(this.client.name)}},props:{client:{type:Object,required:!0}}};c("de75");v.render=O;var h=v,g=Object(n["withScopeId"])("data-v-0d1f4f44");Object(n["pushScopeId"])("data-v-0d1f4f44");var k={class:"filter-bar"},N={class:"filter-bar__input form-item"},S={for:"clientSearch"},V={class:"filter-bar__input form-item"},y=Object(n["createStaticVNode"])('<div class="filter-bar__input form-item" data-v-0d1f4f44><input type="text" name="clientProjectLead" id="clientProjectLead" placeholder="Filter by Project Lead" data-v-0d1f4f44></div><div class="filter-bar__input form-item" data-v-0d1f4f44><select id="clientSortBy" name="clientSortBy" data-v-0d1f4f44><option selected disabled data-v-0d1f4f44>Sort By</option><option value="nameAsc" data-v-0d1f4f44>Name (Asc)</option><option value="nameDesc" data-v-0d1f4f44>Name (Desc)</option><option value="total" data-v-0d1f4f44>Number of Projects</option></select></div>',2);Object(n["popScopeId"])();var _=g((function(e,t,c,r,a,i){var o=Object(n["resolveComponent"])("inline-search-result");return Object(n["openBlock"])(),Object(n["createBlock"])("form",k,[Object(n["createVNode"])("div",N,[Object(n["createVNode"])("label",S,Object(n["toDisplayString"])(i.searchTerm),1),Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"text",name:"clientSearch",id:"clientSearch",placeholder:"Search Clients","onUpdate:modelValue":t[1]||(t[1]=function(e){return i.searchTerm=e})},null,512),[[n["vModelText"],i.searchTerm]])]),Object(n["createVNode"])("div",V,[Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"text",name:"clientAccountManager",id:"clientAccountManager",placeholder:"Filter by Account Manager",onKeyup:t[2]||(t[2]=function(){return i.findAccountManager&&i.findAccountManager.apply(i,arguments)}),"onUpdate:modelValue":t[3]||(t[3]=function(e){return a.accountManager=e})},null,544),[[n["vModelText"],a.accountManager]]),a.results?(Object(n["openBlock"])(!0),Object(n["createBlock"])(n["Fragment"],{key:0},Object(n["renderList"])(a.results,(function(e,t){return Object(n["openBlock"])(),Object(n["createBlock"])("div",{class:"inline-search",key:t},[Object(n["createVNode"])(o,{image:e.avatar,results:e.name,onClick:i.selectResult},null,8,["image","results","onClick"])])})),128)):Object(n["createCommentVNode"])("",!0)]),y])})),C={class:"inline-result"},w={key:0};function B(e,t,c,r,a,i){return Object(n["openBlock"])(),Object(n["createBlock"])("article",C,[c.image?(Object(n["openBlock"])(),Object(n["createBlock"])("figure",w,[Object(n["createVNode"])("img",{src:c.image,alt:""},null,8,["src"])])):Object(n["createCommentVNode"])("",!0),Object(n["createVNode"])("span",null,Object(n["toDisplayString"])(c.result),1)])}var T={name:"InlineSearchResult.vue",props:{image:{required:!1,type:String},result:{required:!0,type:String}}};T.render=B;var M=T,x={name:"ClientFilters.vue",components:{InlineSearchResult:M},data:function(){return{accountManager:"",results:[]}},computed:{searchTerm:{get:function(){return this.$store.state.clients.searchTerm},set:function(e){this.$store.commit("clients/setSearchTerm",e)}}},methods:{findAccountManager:function(e){var t=this;return Object(l["a"])(regeneratorRuntime.mark((function c(){return regeneratorRuntime.wrap((function(c){while(1)switch(c.prev=c.next){case 0:clearTimeout(window.inlineSearchTimeout),window.inlineSearchTimeout=setTimeout((function(){console.log(t.accountManager,e)}),300);case 2:case"end":return c.stop()}}),c)})))()},selectResult:function(){}}};c("3bd2");x.render=_,x.__scopeId="data-v-0d1f4f44";var A=x,L=c("5502"),P={name:"ClientsIndex",components:{ClientCard:h,PageHead:u["a"],ClientFilters:A},computed:Object(s["a"])(Object(s["a"])({},Object(L["c"])({clients:"clients/getAllClients",searchTerm:"clients/getSearchTerm"})),{},{pageSubtitle:function(){return"Your currently have ".concat(this.clients.length," clients")}}),mounted:function(){var e=this;return Object(l["a"])(regeneratorRuntime.mark((function t(){var c;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.$store.commit("util/enableLoader"),t.next=3,e.$api("api/clients","GET");case 3:c=t.sent,e.$store.commit("clients/setClients",c.data),e.$store.commit("util/disableLoader");case 6:case"end":return t.stop()}}),t)})))()},watch:{}};c("4aa0");P.render=o;t["default"]=P}}]);
//# sourceMappingURL=chunk-2aca36c8.3521de43.js.map