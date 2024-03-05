import{o as _,c as p,r as h,l as f,T as g,a as t,w as r,e as c,d as s,u as o,m as x,n as b,p as v}from"./app-mU-QYV1s.js";import{_ as k}from"./_plugin-vue_export-helper-x3n3nnut.js";import{_ as $,a as C,b as D}from"./TextInput-MqRBDhud.js";import{_ as V,a as B}from"./SecondaryButton-tiXH0s-K.js";const U={},A={class:"inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"};function N(d,a){return _(),p("button",A,[h(d.$slots,"default")])}const m=k(U,[["render",N]]),P={class:"space-y-6"},S=s("header",null,[s("h2",{class:"text-lg font-medium text-gray-900"},"Delete Account"),s("p",{class:"mt-1 text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ")],-1),T={class:"p-6"},E=s("h2",{class:"text-lg font-medium text-gray-900"}," Are you sure you want to delete your account? ",-1),F=s("p",{class:"mt-1 text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1),I={class:"mt-6"},K={class:"mt-6 flex justify-end"},G={__name:"DeleteUserForm",setup(d){const a=f(!1),n=f(null),e=g({password:""}),y=()=>{a.value=!0,v(()=>n.value.focus())},i=()=>{e.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>l(),onError:()=>n.value.focus(),onFinish:()=>e.reset()})},l=()=>{a.value=!1,e.reset()};return(O,u)=>(_(),p("section",P,[S,t(m,{onClick:y},{default:r(()=>[c("Delete Account")]),_:1}),t(B,{show:a.value,onClose:l},{default:r(()=>[s("div",T,[E,F,s("div",I,[t($,{for:"password",value:"Password",class:"sr-only"}),t(C,{id:"password",ref_key:"passwordInput",ref:n,modelValue:o(e).password,"onUpdate:modelValue":u[0]||(u[0]=w=>o(e).password=w),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:x(i,["enter"])},null,8,["modelValue"]),t(D,{message:o(e).errors.password,class:"mt-2"},null,8,["message"])]),s("div",K,[t(V,{onClick:l},{default:r(()=>[c(" Cancel ")]),_:1}),t(m,{class:b(["ms-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:i},{default:r(()=>[c(" Delete Account ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{G as default};