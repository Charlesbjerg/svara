(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-5ff24154"],{"523d":function(e,t,a){},"72b4":function(e,t,a){"use strict";a.r(t);a("b0c0");var n=a("7a23"),c={class:"client-create"},r={class:"client-create__main"},o={autocomplete:"off",class:"panel client-create__inner"},u=Object(n["createVNode"])("h2",null,"Create a new Client in Svara",-1),i=Object(n["createVNode"])("p",null,"This is just the initial information about the client, each client user will be added after.",-1),l={class:"form-item--double"},s={class:"form-item"},m=Object(n["createVNode"])("label",{for:"name"},"Company Name",-1),d={class:"form-item"},b=Object(n["createVNode"])("label",{for:"accountManager"},"Account Manager",-1),f={key:0,class:"search-results"},p={class:"search-results__name"},j=Object(n["createVNode"])("i",{class:"far fa-check-circle"},null,-1),O={class:"form-item--double"},g={class:"form-item"},h=Object(n["createVNode"])("label",{for:"name"},"Contact Number",-1),v={class:"form-item"},N=Object(n["createVNode"])("label",{for:"name"},"Contact Email",-1),V=Object(n["createTextVNode"])("Create Client "),k=Object(n["createVNode"])("i",{class:"far fa-plus-square"},null,-1);function M(e,t,a,M,w,y){var C=Object(n["resolveComponent"])("page-head");return Object(n["openBlock"])(),Object(n["createBlock"])("div",c,[Object(n["createVNode"])(C,{title:"Add new Client"}),Object(n["createVNode"])("div",r,[Object(n["createVNode"])("form",o,[u,i,Object(n["createVNode"])("div",l,[Object(n["createVNode"])("div",s,[m,Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"text",id:"name",name:"companyName","onUpdate:modelValue":t[1]||(t[1]=function(e){return w.name=e}),autocomplete:"off"},null,512),[[n["vModelText"],w.name]])]),Object(n["createVNode"])("div",d,[b,Object(n["createVNode"])("input",{type:"text",name:"companyAccountManager",id:"accountManager",onKeyup:t[2]||(t[2]=function(){return y.findAccountManager&&y.findAccountManager.apply(y,arguments)}),autocomplete:"off"},null,32),0!==w.accountManagerResults.length?(Object(n["openBlock"])(),Object(n["createBlock"])("div",f,[(Object(n["openBlock"])(!0),Object(n["createBlock"])(n["Fragment"],null,Object(n["renderList"])(w.accountManagerResults,(function(e){return Object(n["openBlock"])(),Object(n["createBlock"])("article",{class:"search-results__result",key:e.id,onClick:function(t){return y.selectAccountManager(e)}},[Object(n["createVNode"])("span",p,Object(n["toDisplayString"])(e.name),1),j],8,["onClick"])})),128))])):Object(n["createCommentVNode"])("",!0)])]),Object(n["createVNode"])("div",O,[Object(n["createVNode"])("div",g,[h,Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"text",id:"number",name:"companyNumber","onUpdate:modelValue":t[3]||(t[3]=function(e){return w.number=e}),autocomplete:"off"},null,512),[[n["vModelText"],w.number]])]),Object(n["createVNode"])("div",v,[N,Object(n["withDirectives"])(Object(n["createVNode"])("input",{type:"email",id:"email",name:"companyEmail","onUpdate:modelValue":t[4]||(t[4]=function(e){return w.email=e}),autocomplete:"off"},null,512),[[n["vModelText"],w.email]])])]),Object(n["createVNode"])("button",{class:"btn btn-default",type:"button",onClick:t[5]||(t[5]=function(){return y.createClient&&y.createClient.apply(y,arguments)})},[V,k])])])])}a("96cf");var w=a("1da1"),y=a("4a6a"),C={components:{PageHead:y["a"]},data:function(){return{name:"",email:"",number:"",accountManagerResults:[],accountManager:null,keypressTimeout:null}},methods:{findAccountManager:function(e){var t=this;return Object(w["a"])(regeneratorRuntime.mark((function a(){return regeneratorRuntime.wrap((function(a){while(1)switch(a.prev=a.next){case 0:return clearTimeout(t.keypressTimeout),a.next=3,setTimeout(Object(w["a"])(regeneratorRuntime.mark((function a(){var n,c;return regeneratorRuntime.wrap((function(a){while(1)switch(a.prev=a.next){case 0:if(n=e.target.value,!(""!==n&&n.length>=3)){a.next=6;break}return a.next=4,t.$api("api/users/staff","GET",{name:n});case 4:c=a.sent,t.accountManagerResults=c.data;case 6:case"end":return a.stop()}}),a)}))),300);case 3:t.keypressTimeout=a.sent;case 4:case"end":return a.stop()}}),a)})))()},selectAccountManager:function(e){this.accountManager=e,this.accountManagerResults=[],document.getElementById("accountManager").value=e.name},createClient:function(){var e=this;return Object(w["a"])(regeneratorRuntime.mark((function t(){var a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/clients","POST",{name:e.name,contact_email:e.email,contact_number:e.number,accountManager:e.accountManager});case 2:return a=t.sent,t.next=5,e.$router.push("/clients/".concat(a.data.id));case 5:case"end":return t.stop()}}),t)})))()}}};a("ef0c");C.render=M;t["default"]=C},ef0c:function(e,t,a){"use strict";a("523d")}}]);
//# sourceMappingURL=chunk-5ff24154.99e5d4ad.js.map