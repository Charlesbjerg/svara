(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-607f0793"],{"88ae":function(e,r,t){"use strict";t("ca4e")},a55b:function(e,r,t){"use strict";t.r(r);var a=t("7a23"),o={class:"form-card-outer"},c=Object(a["createVNode"])("h1",null,"Login",-1),s={key:0,class:"form-error",ref:"errors"},n={class:"form-item"},i=Object(a["createVNode"])("label",{for:"email"},"Email",-1),d={type:"email",name:"email",id:"email",ref:"email",required:""},l={class:"form-item"},u=Object(a["createVNode"])("label",{for:"password"},"Password:",-1),m={type:"password",name:"password",id:"password",ref:"password",required:""},b={class:"form-item form-item--checkbox"},f={for:"remember"},p={type:"checkbox",name:"remember",id:"remember",ref:"remember"},O=Object(a["createTextVNode"])(" Remember me after login "),j=Object(a["createVNode"])("button",{class:"btn btn-default btn-block"},"Login",-1);function w(e,r,t,w,h,g){return Object(a["openBlock"])(),Object(a["createBlock"])("div",o,[Object(a["createVNode"])("form",{onSubmit:r[1]||(r[1]=function(){return g.login&&g.login.apply(g,arguments)}),class:"form-card"},[c,""!==this.errorMessage?(Object(a["openBlock"])(),Object(a["createBlock"])("div",s,[Object(a["createVNode"])("p",null,Object(a["toDisplayString"])(this.errorMessage),1)],512)):Object(a["createCommentVNode"])("",!0),Object(a["createVNode"])("div",n,[i,Object(a["createVNode"])("input",d,null,512)]),Object(a["createVNode"])("div",l,[u,Object(a["createVNode"])("input",m,null,512)]),Object(a["createVNode"])("div",b,[Object(a["createVNode"])("label",f,[Object(a["createVNode"])("input",p,null,512),O])]),j],32)])}t("4160"),t("b64b"),t("159b"),t("96cf");var h=t("1da1"),g={name:"Login",data:function(){return{errorMessage:""}},methods:{login:function(e){var r=this;return Object(h["a"])(regeneratorRuntime.mark((function t(){var a,o;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return e.preventDefault(),t.next=3,r.$api("api/auth/login","POST",{email:r.$refs.email.value,password:r.$refs.password.value});case 3:a=t.sent,"Error"===a.status?(o=Object.keys(a.data.errors),o.forEach((function(e){r.$refs[e].parentNode.classList.add("form-item--error")})),r.showError(a.message)):(r.$store.commit("auth/setUser",a.data.user),r.$router.push("/dashboard"));case 5:case"end":return t.stop()}}),t)})))()},showError:function(e){console.error("Big error: ".concat(e))}}};t("88ae");g.render=w;r["default"]=g},ca4e:function(e,r,t){}}]);
//# sourceMappingURL=chunk-607f0793.e6cc5075.js.map