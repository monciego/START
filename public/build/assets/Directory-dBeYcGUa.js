import{_}from"./AuthenticatedLayout-ncXaiWn0.js";import{o as s,c as o,a as g,u as i,Z as m,w as l,d as t,F as d,B as h,b as f,t as r,j as p,g as a}from"./app-mU-QYV1s.js";import{d as u,L as y}from"./localizedFormat-AWyK7DYm.js";import"./ApplicationLogo-eo1tK6Xf.js";import"./_plugin-vue_export-helper-x3n3nnut.js";import"./SecondaryButton-tiXH0s-K.js";const x={key:0},v={role:"list",class:"grid m-4 mt-10 grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"},w={class:"group block w-full aspect-w-3 aspect-h-2 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden"},b=t("img",{src:"https://static-00.iconduck.com/assets.00/folder-icon-512x410-jvths5l6.png",alt:"",class:"object-cover pointer-events-none group-hover:opacity-75"},null,-1),k={type:"button",class:"absolute inset-0 focus:outline-none"},L={class:"sr-only"},j={class:"mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none"},D={class:"block text-sm font-medium text-gray-500 pointer-events-none"},B={key:0,class:"flex flex-col gap-8 items-center justify-center"},N=t("img",{class:"h-64 w-full",src:"/assets/empty-directory.svg"},null,-1),V=t("h2",{class:"text-center sm:text-xl uppercase font-bold"}," Nothing can be found here ",-1),F=[N,V],$={key:1},C={role:"list",class:"grid m-4 mt-10 grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"},S={class:"group block w-full aspect-w-3 aspect-h-2 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden"},T=t("img",{src:"https://static-00.iconduck.com/assets.00/folder-icon-512x410-jvths5l6.png",alt:"",class:"object-cover pointer-events-none group-hover:opacity-75"},null,-1),z={type:"button",class:"absolute inset-0 focus:outline-none"},A={class:"sr-only"},E=t("p",{class:"mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none"}," START ",-1),R={class:"block text-sm font-medium text-gray-500 pointer-events-none"},Z={key:0,class:"flex flex-col gap-8 items-center justify-center"},q=t("img",{class:"h-64 w-full",src:"/assets/empty-directory.svg"},null,-1),G=t("h2",{class:"text-center sm:text-xl uppercase font-bold"}," Nothing can be found here ",-1),H=[q,G],U={__name:"Directory",props:["documents","yourDocuments"],setup(n){return u.extend(y),(c,I)=>(s(),o(d,null,[g(i(m),{title:"Directory"}),g(_,null,{default:l(()=>[c.$page.props.role.superadministrator?(s(),o("div",x,[t("ul",v,[(s(!0),o(d,null,h(n.documents,e=>(s(),f(i(p),{href:c.route("directory.show",{directory:e.id}),key:e.id,class:"relative"},{default:l(()=>[t("div",w,[b,t("button",k,[t("span",L,"View details for "+r(e.created_at),1)])]),t("p",j,r(e.identifier_id)+" · "+r(e.user.name),1),t("p",D,r(i(u)(e.created_at).format("LLL")),1)]),_:2},1032,["href"]))),128))]),n.documents.length===0?(s(),o("div",B,F)):a("",!0)])):a("",!0),c.$page.props.role.user?(s(),o("div",$,[t("ul",C,[(s(!0),o(d,null,h(n.yourDocuments,e=>(s(),f(i(p),{href:c.route("directory.show",{directory:e.id}),key:e.id,class:"relative"},{default:l(()=>[t("div",S,[T,t("button",z,[t("span",A,"View details for "+r(e.created_at),1)])]),E,t("p",R,r(i(u)(e.created_at).format("LLL")),1)]),_:2},1032,["href"]))),128))]),n.yourDocuments.length===0?(s(),o("div",Z,H)):a("",!0)])):a("",!0)]),_:1})],64))}};export{U as default};