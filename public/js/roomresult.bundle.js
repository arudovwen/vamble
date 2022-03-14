"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[458],{3694:(t,e,a)=>{a.d(e,{Z:()=>l});var s=a(1519),i=a.n(s)()((function(t){return t[1]}));i.push([t.id,"p[data-v-3c13832c]{font-size:.8rem}.opacity-50[data-v-3c13832c]{opacity:.5}",""]);const l=i},8913:(t,e,a)=>{a.r(e),a.d(e,{default:()=>d});var s=a(1386);const i={data:function(){return{view:!1,rooms:[],roomtypes:[],info:{},detail:{name:"",email:"",address:"",gender:"",phone:"",guests:1,room_id:null,checkIn:"",checkOut:"",nights:null,rooms:null,flats:[],payment_type:null,total_price:0,payment_status:"",status:"",flat_type:"",price:null}}},created:function(){var t=this;s.$.$on("search-room",(function(e){t.rooms=e.rooms,t.detail.checkIn=e.detail.checkIn,t.detail.checkOut=e.detail.checkOut,t.detail.rooms=e.detail.rooms,t.detail.guests=e.detail.guests,t.detail.nights=e.detail.nights,t.detail.total_price=e.detail.total_price,t.detail.flat_type=e.detail.flat_type,t.detail.flats=[]}))},computed:{availableRooms:function(){return this.rooms}},methods:{bookroom:function(){var t=this;this.info=this.rooms.find((function(e){return e.id==t.detail.flats[0]})),this.detail.price=this.info.price,$("#reserve").modal("show")},handleBooking:function(t,e,a){this.detail.checkIn=this.$moment(e).format("YYYY-MM-DD"),this.detail.checkOut=this.$moment(a).format("YYYY-MM-DD"),this.detail.nights=this.$moment(a).diff(this.$moment(e),"days")},payAtHotel:function(){var t=this;this.isFinalizing=!1,this.detail.total_price=this.totalPrice,this.detail.payment_type="pay at hotel",this.detail.payment_status="pending",this.detail.status="reserved",axios.post("/admin/reserve",this.detail).then((function(e){201==e.status&&(t.bookingNumb=e.data.booking_no,t.finalize=!1,t.isFinalizing=!0,t.detail={name:"",email:"",address:"",gender:"",phone:"",guests:1,room_id:null,checkIn:"",checkOut:"",nights:null,rooms:null,flats:[],payment_type:null,total_price:0,payment_status:"",status:"",price:null},t.bookings=[],t.isAvailable=null,$("#reserve").modal("hide"),t.$toast.success("Reservation successful"))})).catch((function(){t.isFinalizing=!0}))}}};var l=a(3379),n=a.n(l),o=a(3694),r={insert:"head",singleton:!1};n()(o.Z,r);o.Z.locals;const d=(0,a(1900).Z)(i,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card"},[t._m(0),t._v(" "),a("div",{staticClass:"card-body p-0"},[t._m(1),t._v(" "),t.availableRooms.length?a("table",{staticClass:"table table-bordered table-striped bg-white mb-0"},[t._m(2),t._v(" "),a("tbody",t._l(t.availableRooms,(function(e){return a("tr",{key:e.id,class:{"opacity-50":t.detail.flats.length==t.detail.rooms&&!t.detail.flats.some((function(t){return t==e.id}))}},[a("td",{staticClass:"text-capitalize",attrs:{scope:"row"}},[t._v("\n            "+t._s(e.flat_type)+"\n          ")]),t._v(" "),a("td",{staticClass:"text-capitalize",attrs:{scope:"row"}},[t._v(t._s(e.flat_name))]),t._v(" "),a("td",{staticClass:"text-capitalize",attrs:{scope:"row"}},[t._v(t._s(e.room_name))]),t._v(" "),a("td",[t._v(t._s(e.description))]),t._v(" "),a("td",[t._v(t._s(e.floor))]),t._v(" "),a("td",[t._v(t._s(e.max_occupancy))]),t._v(" "),a("td",[t._v(t._s(t._f("currencyFormat")(e.price)))]),t._v(" "),a("td",{staticClass:"text-center",attrs:{scope:"row"}},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.detail.flats,expression:"detail.flats"}],attrs:{type:"checkbox",disabled:t.detail.flats.length==t.detail.rooms&&!t.detail.flats.some((function(t){return t==e.id}))},domProps:{value:e.id,checked:Array.isArray(t.detail.flats)?t._i(t.detail.flats,e.id)>-1:t.detail.flats},on:{change:function(a){var s=t.detail.flats,i=a.target,l=!!i.checked;if(Array.isArray(s)){var n=e.id,o=t._i(s,n);i.checked?o<0&&t.$set(t.detail,"flats",s.concat([n])):o>-1&&t.$set(t.detail,"flats",s.slice(0,o).concat(s.slice(o+1)))}else t.$set(t.detail,"flats",l)}}})])])})),0)]):t._e(),t._v(" "),t.detail.flats.length?a("div",{staticClass:"text-right m-3"},[a("button",{staticClass:"btn btn-success",staticStyle:{"font-size":"0.65rem"},attrs:{type:"button"},on:{click:t.bookroom}},[t._v("\n        Book room\n      ")])]):t._e()]),t._v(" "),a("div",{staticClass:"\n      card-footer\n      text-muted\n      d-flex\n      justify-content-between\n      align-items-center\n    "},[t.availableRooms.length?a("div",[t._v("\n      Showing "+t._s(t.availableRooms.length)+" entries\n    ")]):t._e(),t._v(" "),a("div")]),t._v(" "),a("div",{staticClass:"modal fade",attrs:{id:"reserve",tabindex:"-1",role:"dialog","aria-labelledby":"modelTitleId","aria-hidden":"true"}},[a("div",{staticClass:"modal-dialog",attrs:{role:"document"}},[a("div",{staticClass:"modal-content"},[t._m(3),t._v(" "),a("div",{staticClass:"modal-body"},[a("div",{staticClass:"row"},[a("div",{staticClass:"form-group col-12"},[a("div",{staticClass:"d-flex justify-content-between"},[a("p",{staticClass:"mb-1"},[a("span",{staticClass:"text-muted"},[t._v(" Check-in : ")]),t._v("\n                  "+t._s(t._f("moment")(t.detail.checkIn,"ll"))+"\n                ")]),t._v(" "),a("p",{staticClass:"mb-1"},[a("span",{staticClass:"text-muted"},[t._v(" Check-out : ")]),t._v("\n                  "+t._s(t._f("moment")(t.detail.checkOut,"ll"))+"\n                ")])]),t._v(" "),a("div",{staticClass:"d-flex justify-content-between"},[a("p",{staticClass:"mb-1"},[t._v("\n                  "+t._s(t.detail.nights>1?"Nights":"Night")+" x\n                  "+t._s(t.detail.nights)+"\n                ")]),t._v(" "),a("p",{staticClass:"mb-1"},[t._v("\n                  "+t._s(t.detail.rooms>1?"Rooms":"Room")+" x\n                  "+t._s(t.detail.rooms)+"\n                ")])]),t._v(" "),a("div",{staticClass:"d-flex justify-content-between"},[t.info?a("p",{staticClass:"mb-1"},[a("span",{staticClass:"text-muted"},[t._v("Flat type :")]),t._v(" "),a("span",{staticClass:"text-capitalize"},[t._v(t._s(t.info.flat_type)+" ")])]):t._e(),t._v(" "),t.info?a("p",{staticClass:"mb-1"},[a("span",{staticClass:"text-muted"},[t._v("Flat name :")]),t._v(" "),a("span",{staticClass:"text-capitalize"},[t._v(t._s(t.info.flat_name)+" ")])]):t._e()]),t._v(" "),t.info?a("p",{staticClass:"mb-1"},[a("span",{staticClass:"text-muted"},[t._v(" Room price :")]),t._v(" "),a("span",{},[t._v(t._s(t._f("currencyFormat")(t.info.price))+" ")])]):t._e(),t._v(" "),t.info?a("p",[a("span",{staticClass:"text-muted"},[t._v(" Total stay price :")]),t._v(" "),a("strong",{},[t._v(t._s(t._f("currencyFormat")(t.info.price*t.detail.rooms*t.detail.nights))+"\n                ")])]):t._e()])]),t._v(" "),a("hr"),t._v(" "),a("form",{on:{submit:function(e){return e.preventDefault(),t.payAtHotel.apply(null,arguments)}}},[a("h5",{staticClass:"mb-4 text-center"},[t._v("Guest Details")]),t._v(" "),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:""}},[t._v("Full Name")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.detail.name,expression:"detail.name"}],staticClass:"form-control",attrs:{required:"",type:"text","aria-describedby":"helpId",placeholder:""},domProps:{value:t.detail.name},on:{input:function(e){e.target.composing||t.$set(t.detail,"name",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:""}},[t._v("Email ")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.detail.email,expression:"detail.email"}],staticClass:"form-control",attrs:{required:"",type:"email","aria-describedby":"emailHelpId",placeholder:""},domProps:{value:t.detail.email},on:{input:function(e){e.target.composing||t.$set(t.detail,"email",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"row"},[a("div",{staticClass:"form-group col-sm-6"},[a("label",{attrs:{for:""}},[t._v("Phone")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.detail.phone,expression:"detail.phone"}],staticClass:"form-control",attrs:{required:"",type:"text","aria-describedby":"helpId",placeholder:""},domProps:{value:t.detail.phone},on:{input:function(e){e.target.composing||t.$set(t.detail,"phone",e.target.value)}}})]),t._v(" "),a("div",{staticClass:"form-group col-sm-6"},[a("label",{attrs:{for:""}},[t._v("Gender")]),t._v(" "),a("select",{directives:[{name:"model",rawName:"v-model",value:t.detail.gender,expression:"detail.gender"}],staticClass:"form-control",attrs:{required:""},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.detail,"gender",e.target.multiple?a:a[0])}}},[a("option",{attrs:{value:"",disabled:""}},[t._v("Choose gender")]),t._v(" "),a("option",{attrs:{value:"male"}},[t._v("Male")]),t._v(" "),a("option",{attrs:{value:"female"}},[t._v("Female")])])])]),t._v(" "),a("div",{staticClass:"form-group"},[a("label",{attrs:{for:""}},[t._v("Address")]),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.detail.address,expression:"detail.address"}],staticClass:"form-control",attrs:{required:"",type:"text","aria-describedby":"helpId",placeholder:""},domProps:{value:t.detail.address},on:{input:function(e){e.target.composing||t.$set(t.detail,"address",e.target.value)}}})]),t._v(" "),t._m(4)])])])])])])}),[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"card-header d-flex justify-content-between align-items-center"},[a("span",[t._v("Available rooms")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"d-flex justify-content-between align-items-center p-2"},[a("div",{staticClass:"d-flex align-items-center"}),t._v(" "),a("div",{staticClass:"form-group m-0"},[a("input",{staticClass:"form-control form-control-sm",attrs:{type:"seacrh",name:"",id:"","aria-describedby":"helpId",placeholder:"Search name"}})])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("thead",[a("tr",[a("th",[t._v("Flat type")]),t._v(" "),a("th",[t._v("Flat name")]),t._v(" "),a("th",[t._v("Home No")]),t._v(" "),a("th",[t._v("Description")]),t._v(" "),a("th",[t._v("Floor")]),t._v(" "),a("th",{},[t._v("Max")]),t._v(" "),a("th",[t._v("Price")]),t._v(" "),a("th",{staticClass:"text-center"},[t._v("Select")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"modal-header border-0"},[a("h5",{staticClass:"modal-title"},[t._v("Make reservation")]),t._v(" "),a("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[a("span",{attrs:{"aria-hidden":"true"}},[t._v("×")])])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"text-right mt-3"},[a("button",{staticClass:"btn btn-primary mx-auto",attrs:{type:"submit"}},[t._v("\n                Make reservation\n              ")])])}],!1,null,"3c13832c",null).exports},1900:(t,e,a)=>{function s(t,e,a,s,i,l,n,o){var r,d="function"==typeof t?t.options:t;if(e&&(d.render=e,d.staticRenderFns=a,d._compiled=!0),s&&(d.functional=!0),l&&(d._scopeId="data-v-"+l),n?(r=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(n)},d._ssrRegister=r):i&&(r=o?function(){i.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:i),r)if(d.functional){d._injectStyles=r;var c=d.render;d.render=function(t,e){return r.call(e),c(t,e)}}else{var m=d.beforeCreate;d.beforeCreate=m?[].concat(m,r):[r]}return{exports:t,options:d}}a.d(e,{Z:()=>s})}}]);