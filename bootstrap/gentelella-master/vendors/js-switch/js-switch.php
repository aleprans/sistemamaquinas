
<script>

	$('#sound-active-input').prop('checked', true);

	if (Array.prototype.forEach) {
		var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

		elems.forEach(function (html) {
			var switchery = new Switchery(html);
		});
	} else {
		var elems = document.querySelectorAll('.js-switch');

		for (var i = 0; i < elems.length; i++) {
			var switchery = new Switchery(elems[i]);
		}
	}

	// Getting checkbox state
	// On click
	var clickCheckbox = document.querySelector('#sound-active-input'),
		clickButton = document.querySelector('.js-check-click-button');

	if (window.addEventListener) {
		clickButton.addEventListener('click', function () {
			alert(clickCheckbox.checked);
		});
	} else {
		clickButton.attachEvent('onclick', function () {
			alert(clickCheckbox.checked);
		});
	}
	
</script>



<style>
	
.switchery {
    background-color:#fff;
    border:1px solid #dfdfdf;
    border-radius:20px;
    cursor:pointer;
    display:inline-block;
    height:30px;
    position:relative;
    vertical-align:middle;
    width:50px
}
.switchery>small {
    background:#fff;
    border-radius:100%;
    box-shadow:0 1px 3px rgba(0, 0, 0, 0.4);
    height:30px;
    position:absolute;
    top:0;
    width:30px
}
.checkedStyle{
    box-shadow: rgb(100, 189, 99) 0px 0px 0px 16px inset; border-color: rgb(100, 189, 99); transition: border 0.4s, box-shadow 0.4s, background-color 1.2000000000000002s; -webkit-transition: border 0.4s, box-shadow 0.4s, background-color 1.2000000000000002s; background-color: rgb(100, 189, 99);
}

</style>