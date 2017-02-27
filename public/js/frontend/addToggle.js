!function(t){$.fn.attr=function(){if(0===arguments.length){if(0===this.length)return null;var n={};return $.each(this[0].attributes,function(){this.specified&&(n[this.name]=this.value)}),n}return t.apply(this,arguments)}}($.fn.attr);
function toFunc(s){return"function"==typeof s?s:"string"==typeof s?void 0!==window[s]&&"function"==typeof window[s]?window[s]:function(){eval(s)}:function(){return s}};
if($add===undefined)var $add={version:{},auto:{disabled:false}};
$add.version.Toggle = "5.0.0";
$add.ToggleObj = function(state, attributes){
  Obj.apply(this);
  this._state = false;
  this._attributes = {};
  
  Object.defineProperty(this, "state", {
    get: function(){
      this.trigger("getstate state", this._state);
      return this._state;
    },
    set: function(state){
      this._state = !!state;
      this.refresh();
      this.trigger("setstate state", this._state);
    }
  });
  Object.defineProperty(this, "attributes", {
    get: function(){
      this.trigger("getattributes attributes", this._attributes);
      return this._attributes;
    },
    set: function(attributes){
      this._attributes = attributes;
      this.refresh();
      this.trigger("setattributes attributes", this._attributes);
    }
  });
  
  this.set = function(state){
    this.state = state;
    this.trigger("set", state);
    return this;
  };
  this.toggleOn = function(){
    this.set(true);
    this.trigger("toggleon", true);
    return this;
  };
  this.toggleOff = function(){
    this.set(false);
    this.trigger("toggleoff", false);
    return this;
  };
  this.get = function(){
    var s = this.state;
    this.trigger("get", s);
    return s;
  };
  this.toggle = function(){
    if(this._state)
      this.toggleOff();
    else
      this.toggleOn();
    this.trigger("toggle", this._state);
    return this;
  };
  
  this.renderer = function(){
    var self = this;
    var $toggle = $("<div class='addui-Toggle'><div class='addui-Toggle-handle'></div><input type='hidden' class='addui-Toggle-input' /></div>");
    
    if(this._state)
      $toggle.addClass("addui-Toggle-on");
    
    
    $toggle.on("click", function(){
      self.toggle();
    });
    
    $toggle.find(".addui-Toggle-input").val(this._state);
    
    return $toggle;
  };
  this.refresher = function($element){
    $element.removeClass("addui-Toggle-on");
    if(this._state)
      $element.addClass("addui-Toggle-on");
    
    $element.find(".addui-Toggle-input").val(this._state);
  };
  
  this.init = function(state, attributes){
    if(state!==undefined)
      this._state = !!state;
    if(attributes !== undefined)
      this._attributes = attributes;
    for(var attr in attributes){
      
      if(attr.indexOf("on-") == 0){
        var event = attr.replace("on-", '');
        this.on(event, toFunc(attributes[attr]));
      }
    }
  };
  this.init.apply(this, arguments);
};
$add.Toggle = function(selector, state, attributes){
  var toggles = $(selector).map(function(i,el){
    var $el = $(el);
    if(state === undefined) var state = ["true", "t", "yes", "y", "on", "o"].indexOf($el.val().toLowerCase()) > -1;
    if(attributes === undefined){
      var attributes = $el.attr();
    } else {
      attributes = $.extend(attributes, $el.attr());
    }
    var t = new $add.ToggleObj(state, attributes);
    
    t.render(el);
    return t;
  });
  return (toggles.length==1)?toggles[0]:toggles;
};
$.fn.addToggle = function(state, attributes){
  $add.Toggle(this, state, attributes);
};
$add.auto.Toggle = function(){
  if(!$add.auto.disabled){
    $("input[type=toggle]").addToggle();
  }
};
$(function(){
  $add.auto.Toggle();
});
