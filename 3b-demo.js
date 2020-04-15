var demo = {
  init : function () {
  // demo.init() : initialize form

    document.getElementById("sel-country").addEventListener("change", function(){
      demo.up("state")
    });
    document.getElementById("sel-state").addEventListener("change", function(){
      demo.up("city")
    });
    demo.up('country');
  },
  
  toggle : function (disabled) {
  // demo.toggle() : enable/disable form
  // PARAM disabled : true or false

    var all = document.querySelectorAll("#sel-form select, #sel-form input[type=submit]");
    for (var el of all) {
      el.disabled = disabled;
    }
  },

  up : function (target) {
  // demo.up() : update country, state, city via AJAX
  // PARAM target : target select field to load

    // (1) DISABLE FORM
    demo.toggle(true);

    // (2) APPEND FORM DATA
    var data = new FormData();
    data.append('req', target);
    if (target=="state" || target=="city") {
      data.append('country', document.getElementById("sel-country").value);
    }
    if (target=="city") {
      data.append('state', document.getElementById("sel-state").value);
    }

    // (3) INIT AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "2c-ajax-geo.php", true);

    // (4) UPDATE SELECTOR ON AJAX LOAD
    xhr.onload = function(){
      // Append options
      var res = JSON.parse(this.response),
          selector = document.getElementById("sel-" + target);
          selector.innerHTML = "";
      if (res.status) {
        for (var key in res.message) {
          var opt = document.createElement("option");
          opt.value = key;
          opt.innerHTML = res.message[key];
          selector.appendChild(opt);
        }
      } else {
        var opt = document.createElement("option");
        opt.innerHTML = "NA";
        selector.appendChild(opt);
      }

      // Load next
      if (target=="country") { demo.up("state"); }
      if (target=="state") { demo.up("city"); }
      if (target=="city") { demo.toggle(false); }
    };

    // SEND
    xhr.send(data);
  }
};

window.addEventListener("load", demo.init);