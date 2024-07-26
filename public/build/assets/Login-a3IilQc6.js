import{h as y,i as k,v,o as m,c as b,T as V,b as p,w as i,a as t,u as s,Z as B,t as C,g as f,d as r,e as d,n as $,f as P,j as g}from"./app-dOp9qL4S.js";import{_ as q}from"./GuestLayout-caBYrH8g.js";import{_ as h,a as _,b as w}from"./TextInput-mY0vAnKE.js";import{P as N}from"./PrimaryButton-PrIy444M.js";import"./ApplicationLogo-UeBaSOzf.js";import"./_plugin-vue_export-helper-x3n3nnut.js";const R=["value"],U={__name:"Checkbox",props:{checked:{type:[Array,Boolean],required:!0},value:{default:null}},emits:["update:checked"],setup(l,{emit:e}){const u=e,n=l,o=y({get(){return n.checked},set(a){u("update:checked",a)}});return(a,c)=>k((m(),b("input",{type:"checkbox",value:l.value,"onUpdate:modelValue":c[0]||(c[0]=x=>o.value=x),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"},null,8,R)),[[v,o.value]])}},D={key:0,class:"mb-4 font-medium text-sm text-green-600"},L={class:"mt-4"},S={class:"block mt-4"},j={class:"flex items-center"},E=r("span",{class:"ms-2 text-sm text-gray-600"},"Remember me",-1),F={class:"w-full mt-4"},M={class:"mt-6 text-sm text-gray-700"},I={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=V({email:"",password:"",remember:!1}),u=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(n,o)=>(m(),p(q,null,{default:i(()=>[t(s(B),{title:"Log in"}),l.status?(m(),b("div",D,C(l.status),1)):f("",!0),r("form",{onSubmit:P(u,["prevent"])},[r("div",null,[t(h,{for:"email",value:"Email"}),t(_,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":o[0]||(o[0]=a=>s(e).email=a),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(w,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),r("div",L,[t(h,{for:"password",value:"Password"}),t(_,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":o[1]||(o[1]=a=>s(e).password=a),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(w,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),r("div",S,[r("label",j,[t(U,{name:"remember",checked:s(e).remember,"onUpdate:checked":o[2]||(o[2]=a=>s(e).remember=a)},null,8,["checked"]),E])]),r("div",F,[t(N,{class:$(["w-full flex items-center justify-center",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:i(()=>[d(" Log in ")]),_:1},8,["class","disabled"])])],32),r("p",M,[d(" Don't have an account? "),t(s(g),{class:"underline font-semibold text-indigo-600",href:n.route("register")},{default:i(()=>[d(" Register here ")]),_:1},8,["href"])]),l.canResetPassword?(m(),p(s(g),{key:1,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:i(()=>[d(" Forgot your password? ")]),_:1},8,["href"])):f("",!0)]),_:1}))}};export{I as default};