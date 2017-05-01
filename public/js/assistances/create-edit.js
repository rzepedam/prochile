/* jQuery.rut.js */
!function(a){function c(a){return a.replace(/[\.\-]/g,"")}function d(a,b){var c=j(a),d=c[0],e=c[1];if(!d||!e)return d||a;for(var f="",g=b?".":"";d.length>3;)f=g+d.substr(d.length-3)+f,d=d.substring(0,d.length-3);return d+f+"-"+e}function e(a){return a.type&&a.type.match(/^key(up|down|press)/)&&(8===a.keyCode||16===a.keyCode||17===a.keyCode||18===a.keyCode||20===a.keyCode||27===a.keyCode||37===a.keyCode||38===a.keyCode||39===a.keyCode||40===a.keyCode||91===a.keyCode)}function f(a,d){if("string"!=typeof a)return!1;var e=c(a);if("boolean"==typeof d.minimumLength){if(d.minimumLength&&e.length<b.minimumLength)return!1}else{var f=parseInt(d.minimumLength,10);if(e.length<f)return!1}var h=e.charAt(e.length-1).toUpperCase(),i=parseInt(e.substr(0,e.length-1));return!isNaN(i)&&g(i).toString().toUpperCase()===h}function g(a){var b=0,c=2;if("number"==typeof a){a=a.toString();for(var d=a.length-1;d>=0;d--)b+=a.charAt(d)*c,c=(c+1)%8||2;switch(b%11){case 1:return"k";case 0:return 0;default:return 11-b%11}}}function h(a,b){a.val(d(a.val(),b))}function i(a){f(a.val(),a.opts)?a.trigger("rutValido",j(a.val())):a.trigger("rutInvalido")}function j(a){var b=c(a);if(0===b.length)return[null,null];if(1===b.length)return[b,null];var d=b.charAt(b.length-1),e=b.substring(0,b.length-1);return[e,d]}var b={validateOn:"blur",formatOn:"blur",ignoreControlKeys:!0,useThousandsSeparator:!0,minimumLength:2},k={init:function(c){if(this.length>1)for(var d=0;d<this.length;d++)console.log(this[d]),a(this[d]).rut(c);else{var f=this;f.opts=a.extend({},b,c),f.opts.formatOn&&f.on(f.opts.formatOn,function(a){f.opts.ignoreControlKeys&&e(a)||h(f,f.opts.useThousandsSeparator)}),f.opts.validateOn&&f.on(f.opts.validateOn,function(){i(f)})}return this}};a.fn.rut=function(b){return k[b]?k[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?void a.error("El método "+b+" no existe en jQuery.rut"):k.init.apply(this,arguments)},a.formatRut=function(a,b){return void 0===b&&(b=!0),d(a,b)},a.computeDv=function(a){var b=c(a);return g(parseInt(b,10))},a.validateRut=function(b,c,d){if(d=d||{},f(b,d)){var e=j(b);return a.isFunction(c)&&c(e[0],e[1]),!0}return!1}}(jQuery);
$("input#rut").rut().on('rutInvalido', function () {
    toastr.error('Verifique que el rut ha sido ingresado correctamente', 'Rut Incorrecto');
    $(this).focus();
});
function validaEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(email);
}

$("#email").on('change', function () {
    if ( ! validaEmail($(this).val()) ) {
        toastr.error('Verifique que el email ha sido ingresado correctamente', 'Email Incorrecto');
        $(this).focus();
    }
});