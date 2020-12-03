<html lang="en"><head>
<meta charset="UTF-8">

<title>CodePen - International Telephone Input - BOOTSTRAP INPUT GROUP</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>


.intl-tel-input {
  display: table-cell;
}

.intl-tel-input .selected-flag {
  z-index: 4;
}

.intl-tel-input .country-list {
  z-index: 5;
}

.input-group .intl-tel-input .form-control {
  border-top-left-radius: 4px;
  border-top-right-radius: 0;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 0;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<h1>International Telephone Input - BOOTSTRAP INPUT GROUP</h1>
<form>
  <div class="input-group">
    <input type="tel" class="form-control">
    <span class="input-group-addon">Tel</span>
  </div>
  <br>
  <div class="input-group">
    <input type="tel" class="form-control">
    <span class="input-group-addon">Tel</span>
  </div>
</form>


<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script id="rendered-js">
$("input").intlTelInput({
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js" });
//# sourceURL=pen.js
    </script>


</body></html>