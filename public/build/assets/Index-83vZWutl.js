import{_ as r}from"./AuthenticatedLayout-1X-w3CGw.js";import{o as m,c as i,a as c,u as a,Z as g,w as x,d as s,t as e,F as l,g as _}from"./app-IvB1ycj2.js";import{d,L as p}from"./localizedFormat-6jYGGHdK.js";import"./ApplicationLogo-_PpSzgiC.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./SecondaryButton-8z-Xzcco.js";const h={class:"m-2 sm:m-6"},y={class:"px-4 sm:px-0"},u={class:"text-base font-semibold leading-7 text-gray-900"},f=s("p",{class:"mt-1 max-w-2xl text-sm leading-6 text-gray-500"}," Personal details and information. ",-1),v={class:"mt-6 border-t border-gray-100"},b={class:"divide-y divide-gray-100"},Y={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},M=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," Full name ",-1),D={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},B={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},F=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," Email address ",-1),k={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},w={href:"mailto:{{ user.email }}",class:"text-indigo-600"},N={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},P=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," School ",-1),S={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},V={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},j=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," Strand ",-1),C={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},E={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},L=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," Birthdate ",-1),$={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},z={class:"px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"},A=s("dt",{class:"text-sm font-medium leading-6 text-gray-900"}," Age ",-1),I={class:"mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"},R={__name:"Index",props:{user:{type:Object}},setup(t){d.extend(p);const o=d(t.user.birthdate,"YYYY-MM-DD");return console.log(o),(n,Z)=>(m(),i(l,null,[c(a(g),{title:"Profile"}),c(r,null,{default:x(()=>[s("div",h,[s("div",y,[s("h3",u,e(t.user.name)+" Profile ",1),f]),s("div",v,[s("dl",b,[s("div",Y,[M,s("dd",D,e(t.user.name),1)]),s("div",B,[F,s("dd",k,[s("a",w,e(t.user.email),1)])])]),n.$page.props.role.user?(m(),i(l,{key:0},[s("div",N,[P,s("dd",S,e(t.user.school),1)]),s("div",V,[j,s("dd",C,e(t.user.strand),1)]),s("div",E,[L,s("dd",$,e(a(d)(t.user.birthdate).format("MMMM D, YYYY")),1)]),s("div",z,[A,s("dd",I,e(a(d)().diff(a(o),"year")),1)])],64)):_("",!0)])])]),_:1})],64))}};export{R as default};
