(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-03a69ddc"],{"28b1":function(e,t,a){"use strict";a.r(t);a("b0c0");var c=a("7a23"),n={class:"company-index"},o={class:"company-data"},r={class:"project-meta-outer"},l=Object(c["createVNode"])("h2",null,"Project Metadata",-1),i=Object(c["createVNode"])("p",null,"The fields below allow you to setup the metadata that can be captured per project.",-1),s={class:"company-data__card"},d={key:0,style:{margin:"20px 0"}},u=Object(c["createTextVNode"])(" Add meta item "),p=Object(c["createVNode"])("i",{class:"far fa-plus-square ml-5"},null,-1),m={class:"control-groups"},b=Object(c["createVNode"])("h2",null,"User Control",-1),f=Object(c["createVNode"])("p",null,"Create, Delete or reset passwords for your existing users.",-1),j={class:"company-data__card"},O={class:"company-data__btn-group"},N=Object(c["createVNode"])("i",{class:"fas fa-user-plus"},null,-1),h=Object(c["createTextVNode"])(" Add New User "),v=Object(c["createVNode"])("i",{class:"fas fa-user-times"},null,-1),V=Object(c["createTextVNode"])(" Deactivate User "),g=Object(c["createVNode"])("i",{class:"fas fa-user-cog"},null,-1),k=Object(c["createTextVNode"])(" Reset User's Password "),y=Object(c["createVNode"])("h2",null,"Project Signoff Templates",-1),T=Object(c["createVNode"])("p",null,"Template messages that can be used when requesting sign off for a phase of the project from a client.",-1),I={class:"message-templates panel"},x={key:0,class:"message-templates__list"},w={class:"message-template__name"},_=Object(c["createTextVNode"])(" Add New Template "),C=Object(c["createVNode"])("i",{class:"far fa-plus-square ml-5"},null,-1);function M(e,t,a,M,B,A){var E=Object(c["resolveComponent"])("page-head"),D=Object(c["resolveComponent"])("editable-meta-item"),U=Object(c["resolveComponent"])("action-modal");return Object(c["openBlock"])(),Object(c["createBlock"])("div",n,[Object(c["createVNode"])(E,{title:"Company Info"}),Object(c["createVNode"])("div",o,[Object(c["createVNode"])("section",r,[l,i,Object(c["createVNode"])("div",s,[(Object(c["openBlock"])(!0),Object(c["createBlock"])(c["Fragment"],null,Object(c["renderList"])(B.metaItems,(function(e,t){return Object(c["openBlock"])(),Object(c["createBlock"])(D,{key:t,meta:e,index:t,onDelete:A.removeItem},null,8,["meta","index","onDelete"])})),128)),B.metaItems.length>0?(Object(c["openBlock"])(),Object(c["createBlock"])("hr",d)):Object(c["createCommentVNode"])("",!0),Object(c["createVNode"])("button",{class:"btn btn-default",onClick:t[1]||(t[1]=function(){return A.addItem&&A.addItem.apply(A,arguments)})},[u,p])])]),Object(c["createVNode"])("div",m,[Object(c["createVNode"])("section",null,[b,f,Object(c["createVNode"])("div",j,[Object(c["createVNode"])("div",O,[Object(c["createVNode"])("button",{onClick:t[2]||(t[2]=function(e){return A.openModal("AddUser","Add a New User")}),class:"company-data__btn"},[N,h]),Object(c["createVNode"])("button",{onClick:t[3]||(t[3]=function(e){return A.openModal("DeactivateUser","Deactivate a User")}),class:"company-data__btn"},[v,V]),Object(c["createVNode"])("button",{onClick:t[4]||(t[4]=function(e){return A.openModal("ResetPassword","Reset a User's Password")}),class:"company-data__btn"},[g,k])])])]),Object(c["createVNode"])("section",null,[y,T,Object(c["createVNode"])("div",I,[B.templates?(Object(c["openBlock"])(),Object(c["createBlock"])("ul",x,[(Object(c["openBlock"])(!0),Object(c["createBlock"])(c["Fragment"],null,Object(c["renderList"])(B.templates,(function(e){return Object(c["openBlock"])(),Object(c["createBlock"])("li",{class:"message-template",key:e.id},[Object(c["createVNode"])("span",w,Object(c["toDisplayString"])(e.name),1)])})),128))])):Object(c["createCommentVNode"])("",!0),Object(c["createVNode"])("button",{class:"btn btn-default",onClick:t[5]||(t[5]=function(e){return A.openModal("MessageTemplate","View a Message Template")})},[_,C])])])])]),B.modalActive?(Object(c["openBlock"])(),Object(c["createBlock"])(U,{key:0,component:B.modalComponent,title:B.modalTitle,onClose:A.closeModal},null,8,["component","title","onClose"])):Object(c["createCommentVNode"])("",!0)])}a("96cf");var B=a("1da1"),A=a("4a6a"),E={class:"editable-meta"},D={class:"form-item"},U=Object(c["createVNode"])("label",{for:"valueType"},"Data Type:",-1),S=Object(c["createVNode"])("option",{value:"null",selected:"",disabled:""},"Select a Data Type",-1),P=Object(c["createVNode"])("option",{value:"text"},"Text",-1),R=Object(c["createVNode"])("option",{value:"number"},"Number",-1),F=Object(c["createVNode"])("option",{value:"date"},"Date",-1),$={class:"form-item--checkbox form-item"},q=Object(c["createTextVNode"])(" Meta data can be used to sort the list of projects ");function L(e,t,a,n,o,r){return Object(c["openBlock"])(),Object(c["createBlock"])("article",E,[o.editingTitle?Object(c["withDirectives"])((Object(c["openBlock"])(),Object(c["createBlock"])("input",{key:0,type:"text",class:"editable-meta__title editable-meta__title--input","aria-label":"Edit the meta item title","onUpdate:modelValue":t[1]||(t[1]=function(e){return a.meta.name=e}),onBlur:t[2]||(t[2]=function(){return r.blurInput&&r.blurInput.apply(r,arguments)})},null,544)),[[c["vModelText"],a.meta.name]]):(Object(c["openBlock"])(),Object(c["createBlock"])("h3",{key:1,class:"editable-meta__title",onClick:t[3]||(t[3]=function(e){return o.editingTitle=!0})},Object(c["toDisplayString"])(a.meta.name),1)),Object(c["createVNode"])("div",D,[U,Object(c["withDirectives"])(Object(c["createVNode"])("select",{"onUpdate:modelValue":t[4]||(t[4]=function(e){return a.meta.valueType=e}),id:"valueType",onChange:t[5]||(t[5]=function(){return r.updateMeta&&r.updateMeta.apply(r,arguments)})},[S,P,R,F],544),[[c["vModelSelect"],a.meta.valueType]])]),Object(c["createVNode"])("div",$,[Object(c["createVNode"])("label",{for:"sortable-".concat(a.index)},[Object(c["withDirectives"])(Object(c["createVNode"])("input",{type:"checkbox","onUpdate:modelValue":t[6]||(t[6]=function(e){return r.sortable=e}),id:"sortable-".concat(a.index),onChange:t[7]||(t[7]=function(){return r.updateMeta&&r.updateMeta.apply(r,arguments)})},null,40,["id"]),[[c["vModelCheckbox"],r.sortable]]),q],8,["for"])])])}a("a9e3");var G={name:"EditableMetaItem",props:{meta:{required:!0,type:Object},index:{required:!0,type:Number}},computed:{sortable:{get:function(){return 1===this.meta.sortable},set:function(e){return this.meta.sortable=e}}},data:function(){return{editingTitle:!1}},methods:{blurInput:function(){this.editingTitle=!1,this.updateMeta()},updateMeta:function(){var e=this;return Object(B["a"])(regeneratorRuntime.mark((function t(){var a,c,n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(null==e.meta.name||null==e.meta.valueType){t.next=7;break}return a=e.meta.hasOwnProperty("id")?"PATCH":"POST",c=e.meta.hasOwnProperty("id")?"api/project-meta/".concat(e.meta.id):"api/project-meta",t.next=5,e.$api(c,a,e.meta);case 5:n=t.sent,e.$emit("update",n.data);case 7:case"end":return t.stop()}}),t)})))()},deleteItem:function(){this.$emit("delete",meta.id)}}};a("77f0");G.render=L;var H=G,J=a("053a"),X={components:{ActionModal:J["a"],EditableMetaItem:H,PageHead:A["a"]},data:function(){return{metaItems:[],modalActive:!1,modalComponent:"",modalTitle:"",templates:[]}},mounted:function(){var e=this;return Object(B["a"])(regeneratorRuntime.mark((function t(){var a,c;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/project-meta");case 2:return a=t.sent,e.metaItems=a.data,t.next=6,e.$api("api/projects/pipeline/signoffs/templates");case 6:c=t.sent,e.templates=c.data;case 8:case"end":return t.stop()}}),t)})))()},methods:{addItem:function(){this.metaItems.push({title:"Meta Item Name",sortable:!1,dataType:null})},removeItem:function(e){},openModal:function(e,t){this.modalActive=!0,this.modalComponent=e,this.modalTitle=t},closeModal:function(){this.modalActive=!1,this.modalComponent="",this.modalTitle=""},createTemplate:function(){this.$store.commit("entities/createBlankTemplate")}}};a("f43c");X.render=M;t["default"]=X},5899:function(e,t){e.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},"58a8":function(e,t,a){var c=a("1d80"),n=a("5899"),o="["+n+"]",r=RegExp("^"+o+o+"*"),l=RegExp(o+o+"*$"),i=function(e){return function(t){var a=String(c(t));return 1&e&&(a=a.replace(r,"")),2&e&&(a=a.replace(l,"")),a}};e.exports={start:i(1),end:i(2),trim:i(3)}},7156:function(e,t,a){var c=a("861d"),n=a("d2bb");e.exports=function(e,t,a){var o,r;return n&&"function"==typeof(o=t.constructor)&&o!==a&&c(r=o.prototype)&&r!==a.prototype&&n(e,r),e}},"77f0":function(e,t,a){"use strict";a("d8fe")},a9e3:function(e,t,a){"use strict";var c=a("83ab"),n=a("da84"),o=a("94ca"),r=a("6eeb"),l=a("5135"),i=a("c6b6"),s=a("7156"),d=a("c04e"),u=a("d039"),p=a("7c73"),m=a("241c").f,b=a("06cf").f,f=a("9bf2").f,j=a("58a8").trim,O="Number",N=n[O],h=N.prototype,v=i(p(h))==O,V=function(e){var t,a,c,n,o,r,l,i,s=d(e,!1);if("string"==typeof s&&s.length>2)if(s=j(s),t=s.charCodeAt(0),43===t||45===t){if(a=s.charCodeAt(2),88===a||120===a)return NaN}else if(48===t){switch(s.charCodeAt(1)){case 66:case 98:c=2,n=49;break;case 79:case 111:c=8,n=55;break;default:return+s}for(o=s.slice(2),r=o.length,l=0;l<r;l++)if(i=o.charCodeAt(l),i<48||i>n)return NaN;return parseInt(o,c)}return+s};if(o(O,!N(" 0o1")||!N("0b1")||N("+0x1"))){for(var g,k=function(e){var t=arguments.length<1?0:e,a=this;return a instanceof k&&(v?u((function(){h.valueOf.call(a)})):i(a)!=O)?s(new N(V(t)),a,k):V(t)},y=c?m(N):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger,fromString,range".split(","),T=0;y.length>T;T++)l(N,g=y[T])&&!l(k,g)&&f(k,g,b(N,g));k.prototype=h,h.constructor=k,r(n,O,k)}},af21:function(e,t,a){},d8fe:function(e,t,a){},f43c:function(e,t,a){"use strict";a("af21")}}]);
//# sourceMappingURL=chunk-03a69ddc.47c83b66.js.map