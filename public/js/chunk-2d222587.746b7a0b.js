(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d222587"],{cde5:function(e,t,a){"use strict";a.r(t);a("b0c0");var r=a("7a23"),c=Object(r["withScopeId"])("data-v-240b44e4");Object(r["pushScopeId"])("data-v-240b44e4");var o=Object(r["createTextVNode"])(" TODO: Display activate account fields, and fetch necessary data in mounted "),n={key:0},s={class:"form-item"},i=Object(r["createVNode"])("label",{for:"password"},"Password",-1),d={class:"form-item"},u=Object(r["createVNode"])("label",{for:"confirmPassword"},"Confirm Password",-1);Object(r["popScopeId"])();var p=c((function(e,t,a,c,p,l){var b=Object(r["resolveComponent"])("page-head");return Object(r["openBlock"])(),Object(r["createBlock"])("div",null,[Object(r["createVNode"])(b,{title:"Activate a New Account"}),o,p.user?(Object(r["openBlock"])(),Object(r["createBlock"])("div",n,[Object(r["createTextVNode"])(" Activating account for: "+Object(r["toDisplayString"])(p.user.name)+" - "+Object(r["toDisplayString"])(p.user.job_role)+" ",1),Object(r["createVNode"])("div",s,[i,Object(r["withDirectives"])(Object(r["createVNode"])("input",{type:"password","onUpdate:modelValue":t[1]||(t[1]=function(e){return p.password=e}),id:"password"},null,512),[[r["vModelText"],p.password]])]),Object(r["createVNode"])("div",d,[u,Object(r["withDirectives"])(Object(r["createVNode"])("input",{type:"password","onUpdate:modelValue":t[2]||(t[2]=function(e){return p.confirmPassword=e}),id:"confirmPassword"},null,512),[[r["vModelText"],p.confirmPassword]])])])):Object(r["createCommentVNode"])("",!0),Object(r["createVNode"])("button",{class:"btn btn-default",onClick:t[3]||(t[3]=function(){return l.activate&&l.activate.apply(l,arguments)})},"Activate Account")])})),l=(a("96cf"),a("1da1")),b=a("4a6a"),w={name:"ActivateAccount.vue",components:{PageHead:b["a"]},data:function(){return{user:null,password:"",confirmPassword:""}},mounted:function(){var e=this;return Object(l["a"])(regeneratorRuntime.mark((function t(){var a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/activate/".concat(e.$route.params.key));case 2:a=t.sent,e.user=a.data,console.log(e.user);case 5:case"end":return t.stop()}}),t)})))()},methods:{activate:function(){var e=this;return Object(l["a"])(regeneratorRuntime.mark((function t(){var a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/activate/".concat(e.$route.params.key),"POST",{password:e.password,confirmPassword:e.confirmPassword});case 2:if(a=t.sent,"Error"===a.status){t.next=6;break}return t.next=6,e.$router.push("/dashboard");case 6:case"end":return t.stop()}}),t)})))()}}};w.render=p,w.__scopeId="data-v-240b44e4";t["default"]=w}}]);
//# sourceMappingURL=chunk-2d222587.746b7a0b.js.map