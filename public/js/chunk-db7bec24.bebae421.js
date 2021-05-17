(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-db7bec24"],{"049b":function(e,t,n){},"053a":function(e,t,n){"use strict";var a=n("7a23"),r={class:"action-modal-outer",ref:"modal"},o=Object(a["createVNode"])("div",{class:"action-modal-overlay"},null,-1),c={class:"action-modal"},i={class:"action-modal__head"},s={class:"action-modal__title"},l=Object(a["createVNode"])("i",{class:"fas fa-times"},null,-1);function u(e,t,n,u,d,p){return Object(a["openBlock"])(),Object(a["createBlock"])("aside",r,[o,Object(a["createVNode"])("div",c,[Object(a["createVNode"])("header",i,[Object(a["createVNode"])("h2",s,Object(a["toDisplayString"])(n.title),1),Object(a["createVNode"])("button",{class:"action-modal__close",onClick:t[1]||(t[1]=function(){return p.closeModal&&p.closeModal.apply(p,arguments)})},[l])]),n.component?(Object(a["openBlock"])(),Object(a["createBlock"])(Object(a["resolveDynamicComponent"])(n.component),{key:0,onClose:p.closeModal},null,8,["onClose"])):Object(a["renderSlot"])(e.$slots,"default",{key:1})])],512)}n("b0c0");var d=Object(a["withScopeId"])("data-v-88235694");Object(a["pushScopeId"])("data-v-88235694");var p={class:"add-user"},m=Object(a["createVNode"])("p",null,"The new user will be sent an email to finish setting up this account. The account will automatically be attached to this company.",-1),f={class:"form-item"},b=Object(a["createVNode"])("label",{for:"name"},"Full Name",-1),j={class:"form-item"},O=Object(a["createVNode"])("label",{for:"jobRole"},"Job Role",-1),v={class:"form-item"},h=Object(a["createVNode"])("label",{for:"email"},"Email Address",-1),y={class:"form-item"},g=Object(a["createVNode"])("label",{for:"type"},"User Type",-1),k=Object(a["createVNode"])("option",{disabled:"",selected:""},"Select a type",-1),w={class:"form-item"},V=Object(a["createVNode"])("label",{for:"team"},"Team",-1),N=Object(a["createVNode"])("option",{disabled:"",selected:""},"Select a team",-1);Object(a["popScopeId"])();var S=d((function(e,t,n,r,o,c){return Object(a["openBlock"])(),Object(a["createBlock"])("div",p,[m,Object(a["createVNode"])("div",f,[b,Object(a["withDirectives"])(Object(a["createVNode"])("input",{type:"text",id:"name","onUpdate:modelValue":t[1]||(t[1]=function(e){return o.name=e}),placeholder:"Full Name",autocomplete:"off"},null,512),[[a["vModelText"],o.name]])]),Object(a["createVNode"])("div",j,[O,Object(a["withDirectives"])(Object(a["createVNode"])("input",{type:"text",id:"jobRole","onUpdate:modelValue":t[2]||(t[2]=function(e){return o.jobRole=e}),placeholder:"Graphic Designer",autocomplete:"off"},null,512),[[a["vModelText"],o.jobRole]])]),Object(a["createVNode"])("div",v,[h,Object(a["withDirectives"])(Object(a["createVNode"])("input",{type:"email",id:"email","onUpdate:modelValue":t[3]||(t[3]=function(e){return o.email=e}),placeholder:"dev@svara.io",autocomplete:"off"},null,512),[[a["vModelText"],o.email]])]),Object(a["createVNode"])("div",y,[g,Object(a["withDirectives"])(Object(a["createVNode"])("select",{id:"type","onUpdate:modelValue":t[4]||(t[4]=function(e){return o.type=e})},[k,(Object(a["openBlock"])(!0),Object(a["createBlock"])(a["Fragment"],null,Object(a["renderList"])(o.types,(function(e,t){return Object(a["openBlock"])(),Object(a["createBlock"])("option",{key:t,value:e.id},Object(a["toDisplayString"])(e.type),9,["value"])})),128))],512),[[a["vModelSelect"],o.type]])]),Object(a["createVNode"])("div",w,[V,Object(a["withDirectives"])(Object(a["createVNode"])("select",{id:"team","onUpdate:modelValue":t[5]||(t[5]=function(e){return o.team=e})},[N,(Object(a["openBlock"])(!0),Object(a["createBlock"])(a["Fragment"],null,Object(a["renderList"])(o.teams,(function(e,t){return Object(a["openBlock"])(),Object(a["createBlock"])("option",{key:t,value:e.id},Object(a["toDisplayString"])(e.name),9,["value"])})),128))],512),[[a["vModelSelect"],o.team]])]),Object(a["createVNode"])("button",{class:"btn btn-default",onClick:t[6]||(t[6]=function(){return c.submit&&c.submit.apply(c,arguments)})},"Create User")])})),C=(n("96cf"),n("1da1")),B={name:"AddUser",data:function(){return{name:"",jobRole:"",email:"",type:null,team:null,types:[],teams:[]}},mounted:function(){var e=this;return Object(C["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/users/setup-data");case 2:n=t.sent,e.types=n.data.types,e.teams=n.data.teams;case 5:case"end":return t.stop()}}),t)})))()},methods:{submit:function(){var e=this;return Object(C["a"])(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/register","POST",{name:e.name,jobRole:e.jobRole,email:e.email,type:e.type,team:e.team});case 2:t.sent,e.$emit("close"),e.$store.commit("util/setGlobalNotif",{message:"New user has been added!",type:"success"});case 5:case"end":return t.stop()}}),t)})))()}}};B.render=S,B.__scopeId="data-v-88235694";var R=B,U={class:"deact-user"},x=Object(a["createVNode"])("p",null,"Deactivates a user account. The user can be reinstated at a later date if necessary. Users cannot be fully deleted as an audit trail is required throughout Svara. ",-1),D={class:"form-item"},M=Object(a["createVNode"])("label",{for:"user"},"Find User (By Name)",-1),T={key:0,class:"search-results"},P={class:"search-results__name"},$=Object(a["createVNode"])("i",{class:"far fa-check-circle"},null,-1);function _(e,t,n,r,o,c){var i=Object(a["resolveComponent"])("staff-member-card");return Object(a["openBlock"])(),Object(a["createBlock"])("div",U,[x,Object(a["createVNode"])("div",D,[M,Object(a["createVNode"])("input",{type:"text",name:"user",id:"user",onKeyup:t[1]||(t[1]=function(){return c.findUser&&c.findUser.apply(c,arguments)}),autocomplete:"off"},null,32),0!==o.userResults.length?(Object(a["openBlock"])(),Object(a["createBlock"])("div",T,[(Object(a["openBlock"])(!0),Object(a["createBlock"])(a["Fragment"],null,Object(a["renderList"])(o.userResults,(function(e){return Object(a["openBlock"])(),Object(a["createBlock"])("article",{class:"search-results__result",key:e.id,onClick:function(t){return c.selectUser(e)}},[Object(a["createVNode"])("span",P,Object(a["toDisplayString"])(e.name),1),$],8,["onClick"])})),128))])):Object(a["createCommentVNode"])("",!0)]),o.user?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:0,user:o.user},null,8,["user"])):Object(a["createCommentVNode"])("",!0),Object(a["createVNode"])("button",{class:"btn btn-alt",onClick:t[2]||(t[2]=function(){return c.disableUser&&c.disableUser.apply(c,arguments)})},"Disable User")])}var E=n("e4e1"),A={name:"DeactivateUser",components:{StaffMemberCard:E["a"]},data:function(){return{userResults:[],user:null}},methods:{findUser:function(e){var t=this;return Object(C["a"])(regeneratorRuntime.mark((function n(){var a,r;return regeneratorRuntime.wrap((function(n){while(1)switch(n.prev=n.next){case 0:return a=e.target.value,n.next=3,t.$api("api/users/staff","GET",{name:a});case 3:r=n.sent,t.userResults=r.data;case 5:case"end":return n.stop()}}),n)})))()},selectUser:function(e){this.user=e,this.userResults=[]},disableUser:function(){var e=this;return Object(C["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/deactivate/".concat(e.user.id),"DELETE");case 2:n=t.sent,n.data.success&&(e.$store.commit("util/setGlobalNotif",{message:"User has been deactivated!",type:"success"}),e.$emit("close"));case 4:case"end":return t.stop()}}),t)})))()}}};n("b04d");A.render=_;var L=A,I={class:"deact-user"},F=Object(a["createVNode"])("p",null,"Resets a users password. They will have an email sent to them directly from Svara, allowing them to reset their password.",-1),K={class:"form-item"},G=Object(a["createVNode"])("label",{for:"user"},"Find User (By Name)",-1),q={key:0,class:"search-results"},z={class:"search-results__name"},J=Object(a["createVNode"])("i",{class:"far fa-check-circle"},null,-1);function H(e,t,n,r,o,c){var i=Object(a["resolveComponent"])("staff-member-card");return Object(a["openBlock"])(),Object(a["createBlock"])("div",I,[F,Object(a["createVNode"])("div",K,[G,Object(a["createVNode"])("input",{type:"text",name:"user",id:"user",onKeyup:t[1]||(t[1]=function(){return c.findUser&&c.findUser.apply(c,arguments)}),autocomplete:"off"},null,32),0!==o.userResults.length?(Object(a["openBlock"])(),Object(a["createBlock"])("div",q,[(Object(a["openBlock"])(!0),Object(a["createBlock"])(a["Fragment"],null,Object(a["renderList"])(o.userResults,(function(e){return Object(a["openBlock"])(),Object(a["createBlock"])("article",{class:"search-results__result",key:e.id,onClick:function(t){return c.selectUser(e)}},[Object(a["createVNode"])("span",z,Object(a["toDisplayString"])(e.name),1),J],8,["onClick"])})),128))])):Object(a["createCommentVNode"])("",!0)]),o.user?(Object(a["openBlock"])(),Object(a["createBlock"])(i,{key:0,user:o.user},null,8,["user"])):Object(a["createCommentVNode"])("",!0),Object(a["createVNode"])("button",{class:"btn btn-default",onClick:t[2]||(t[2]=function(){return c.resetPassword&&c.resetPassword.apply(c,arguments)})},"Reset User's Password")])}var W={name:"ResetPassword",components:{StaffMemberCard:E["a"]},data:function(){return{userResults:[],user:null}},methods:{findUser:function(e){var t=this;return Object(C["a"])(regeneratorRuntime.mark((function n(){var a,r;return regeneratorRuntime.wrap((function(n){while(1)switch(n.prev=n.next){case 0:if(a=e.target.value,""===a){n.next=8;break}return n.next=4,t.$api("api/users","GET",{name:a});case 4:r=n.sent,t.userResults=r.data,n.next=9;break;case 8:t.userResults=[];case 9:case"end":return n.stop()}}),n)})))()},selectUser:function(e){this.user=e,this.userResults=[]},resetPassword:function(){var e=this;return Object(C["a"])(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api("api/auth/forgot-password/".concat(e.user.id),"POST");case 2:t.sent,e.$store.commit("util/setGlobalNotif",{message:"Password reset has been sent to the users email address!",type:"success"}),e.$emit("close");case 5:case"end":return t.stop()}}),t)})))()}}};n("bb56");W.render=H;var Q=W,X=Object(a["withScopeId"])("data-v-4a7f5afa");Object(a["pushScopeId"])("data-v-4a7f5afa");var Y={class:"form-item"},Z=Object(a["createVNode"])("label",{for:"name"},"Template Name",-1),ee={class:"form-item"},te=Object(a["createVNode"])("label",{for:"message"},"Message",-1);Object(a["popScopeId"])();var ne=X((function(e,t,n,r,o,c){var i=Object(a["resolveComponent"])("editor");return Object(a["openBlock"])(),Object(a["createBlock"])("div",null,[Object(a["createVNode"])("div",Y,[Z,Object(a["withDirectives"])(Object(a["createVNode"])("input",{type:"text",id:"name",placeholder:"Design Sign-off","onUpdate:modelValue":t[1]||(t[1]=function(e){return c.template.name=e}),onKeyup:t[2]||(t[2]=function(){return c.update&&c.update.apply(c,arguments)})},null,544),[[a["vModelText"],c.template.name]])]),Object(a["createVNode"])("div",ee,[te,Object(a["createVNode"])(i,{id:"message",class:"content-editor__wrap",initialValue:"Write your message here.",apiKey:"2jbjcyf0lfyi82ml1rcyh4ys7wfcidwxwmmi5cdl9xzoeuyc",modelValue:c.template.message,"onUpdate:modelValue":t[3]||(t[3]=function(e){return c.template.message=e}),onKeyup:c.update,init:{height:400,menubar:!1,plugins:["advlist autolink lists link image charmap","print preview anchor insertdatetime media","paste code help table"],toolbar:"formatselect | bold italic |                     bullist numlist | help"}},null,8,["modelValue","onKeyup"])])])})),ae=n("ca72"),re={name:"MessageTemplate",components:{Editor:ae["a"]},computed:{template:function(){return this.$store.state.entities.signOff.selected}},data:function(){return{updateTimeout:null}},methods:{update:function(){var e=this;return Object(C["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return n=e,clearTimeout(e.updateTimeout),t.next=4,setTimeout(Object(C["a"])(regeneratorRuntime.mark((function t(){var a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(""===n.template.name||""===n.template.message){t.next=11;break}if(!n.template.hasOwnProperty("id")){t.next=7;break}return t.next=4,e.$api("api/projects/pipeline/signoffs/templates/".concat(n.template.id),"PATCH",n.template);case 4:a=t.sent,t.next=10;break;case 7:return t.next=9,e.$api("api/projects/pipeline/signoffs/templates","POST",n.template);case 9:a=t.sent;case 10:e.$store.commit("entities/updateTemplate",a.data);case 11:case"end":return t.stop()}}),t)}))),5e3);case 4:e.updateTimeout=t.sent;case 5:case"end":return t.stop()}}),t)})))()}}};re.render=ne,re.__scopeId="data-v-4a7f5afa";var oe=re,ce={name:"ActionModal",components:{AddUser:R,DeactivateUser:L,ResetPassword:Q,MessageTemplate:oe},props:{component:{type:String,required:!1,default:null},title:{type:String,required:!0},active:{type:Boolean,required:!1,default:!1}},mounted:function(){var e=this;this.$nextTick((function(){setTimeout((function(){e.$refs.modal.classList.add("active")}),250)}))},methods:{closeModal:function(){var e=this;this.$refs.modal.classList.remove("active"),setTimeout((function(){e.$emit("close")}),400)}}};n("0ddb");ce.render=u;t["a"]=ce},"0ddb":function(e,t,n){"use strict";n("049b")},b04d:function(e,t,n){"use strict";n("b2fd")},b2fd:function(e,t,n){},bb56:function(e,t,n){"use strict";n("fd77")},c4a9:function(e,t,n){"use strict";(function(e){n.d(t,"a",(function(){return r}));var a=function(){return"undefined"!==typeof window?window:e},r=function(){var e=a();return e&&e.tinymce?e.tinymce:null}}).call(this,n("c8ba"))},ca72:function(e,t,n){"use strict";var a=n("7a23"),r=["onActivate","onAddUndo","onBeforeAddUndo","onBeforeExecCommand","onBeforeGetContent","onBeforeRenderUI","onBeforeSetContent","onBeforePaste","onBlur","onChange","onClearUndos","onClick","onContextMenu","onCopy","onCut","onDblclick","onDeactivate","onDirty","onDrag","onDragDrop","onDragEnd","onDragGesture","onDragOver","onDrop","onExecCommand","onFocus","onFocusIn","onFocusOut","onGetContent","onHide","onInit","onKeyDown","onKeyPress","onKeyUp","onLoadContent","onMouseDown","onMouseEnter","onMouseLeave","onMouseMove","onMouseOut","onMouseOver","onMouseUp","onNodeChange","onObjectResizeStart","onObjectResized","onObjectSelected","onPaste","onPostProcess","onPostRender","onPreProcess","onProgressState","onRedo","onRemove","onReset","onSaveContent","onSelectionChange","onSetAttrib","onSetContent","onShow","onSubmit","onUndo","onVisualAid"],o=function(e){return-1!==r.map((function(e){return e.toLowerCase()})).indexOf(e.toLowerCase())},c=function(e,t,n){Object.keys(t).filter(o).forEach((function(a){var r=t[a];"function"===typeof r&&("onInit"===a?r(e,n):n.on(a.substring(2),(function(e){return r(e,n)})))}))},i=function(e,t,n,r){var o=e.modelEvents?e.modelEvents:null,c=Array.isArray(o)?o.join(" "):o;Object(a["watch"])(r,(function(t,a){n&&"string"===typeof t&&t!==a&&t!==n.getContent({format:e.outputFormat})&&n.setContent(t)})),n.on(c||"change input undo redo",(function(){t.emit("update:modelValue",n.getContent({format:e.outputFormat}))}))},s=function(e,t,n,a,r,o){a.setContent(o()),n.attrs["onUpdate:modelValue"]&&i(t,n,a,r),c(e,n.attrs,a)},l=0,u=function(e){var t=Date.now(),n=Math.floor(1e9*Math.random());return l++,e+"_"+n+l+String(t)},d=function(e){return null!==e&&"textarea"===e.tagName.toLowerCase()},p=function(e){return"undefined"===typeof e||""===e?[]:Array.isArray(e)?e:e.split(" ")},m=function(e,t){return p(e).concat(p(t))},f=function(e){return null===e||void 0===e},b=function(){return{listeners:[],scriptId:u("tiny-script"),scriptLoaded:!1}},j=function(){var e=b(),t=function(e,t,n,a){var r=t.createElement("script");r.referrerPolicy="origin",r.type="application/javascript",r.id=e,r.src=n;var o=function(){r.removeEventListener("load",o),a()};r.addEventListener("load",o),t.head&&t.head.appendChild(r)},n=function(n,a,r){e.scriptLoaded?r():(e.listeners.push(r),n.getElementById(e.scriptId)||t(e.scriptId,n,a,(function(){e.listeners.forEach((function(e){return e()})),e.scriptLoaded=!0})))},a=function(){e=b()};return{load:n,reinitialize:a}},O=j(),v=n("c4a9"),h={apiKey:String,cloudChannel:String,id:String,init:Object,initialValue:String,inline:Boolean,modelEvents:[String,Array],plugins:[String,Array],tagName:String,toolbar:[String,Array],modelValue:String,disabled:Boolean,tinymceScriptSrc:String,outputFormat:{type:String,validator:function(e){return"html"===e||"text"===e}}},y=function(){return y=Object.assign||function(e){for(var t,n=1,a=arguments.length;n<a;n++)for(var r in t=arguments[n],t)Object.prototype.hasOwnProperty.call(t,r)&&(e[r]=t[r]);return e},y.apply(this,arguments)},g=function(e,t,n,a){return e(a||"div",{id:t,ref:n})},k=function(e,t,n){return e("textarea",{id:t,visibility:"hidden",ref:n})},w=Object(a["defineComponent"])({props:h,setup:function(e,t){var n=Object(a["toRefs"])(e),r=n.disabled,o=n.modelValue,c=Object(a["ref"])(null),i=null,l=e.id||u("tiny-vue"),p=e.init&&e.init.inline||e.inline,b=!!t.attrs["onUpdate:modelValue"],j=!0,h=e.initialValue?e.initialValue:"",w="",V=function(e){return b?function(){return(null===o||void 0===o?void 0:o.value)?o.value:""}:function(){return e?h:w}},N=function(){var n=V(j),a=y(y({},e.init),{readonly:e.disabled,selector:"#"+l,plugins:m(e.init&&e.init.plugins,e.plugins),toolbar:e.toolbar||e.init&&e.init.toolbar,inline:p,setup:function(a){i=a,a.on("init",(function(r){return s(r,e,t,a,o,n)})),e.init&&"function"===typeof e.init.setup&&e.init.setup(a)}});d(c.value)&&(c.value.style.visibility=""),Object(v["a"])().init(a),j=!1};return Object(a["watch"])(r,(function(e){null!==i&&i.setMode(e?"readonly":"design")})),Object(a["onMounted"])((function(){if(null!==Object(v["a"])())N();else if(c.value&&c.value.ownerDocument){var t=e.cloudChannel?e.cloudChannel:"5",n=e.apiKey?e.apiKey:"no-api-key",a=f(e.tinymceScriptSrc)?"https://cdn.tiny.cloud/1/"+n+"/tinymce/"+t+"/tinymce.min.js":e.tinymceScriptSrc;O.load(c.value.ownerDocument,a,N)}})),Object(a["onBeforeUnmount"])((function(){null!==Object(v["a"])()&&Object(v["a"])().remove(i)})),p||(Object(a["onActivated"])((function(){j||N()})),Object(a["onDeactivated"])((function(){var e;b||(w=i.getContent()),null===(e=Object(v["a"])())||void 0===e||e.remove(i)}))),function(){return p?g(a["h"],l,c,e.tagName):k(a["h"],l,c)}}});t["a"]=w},fd77:function(e,t,n){}}]);
//# sourceMappingURL=chunk-db7bec24.bebae421.js.map