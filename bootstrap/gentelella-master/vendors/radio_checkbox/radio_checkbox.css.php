
<style>
.label-checkbox {
	display: inline-block !important;
	height: 18px !important;
	top: 10px !important;
    width: 5px !important;
    padding: 3px 8px !important;
	margin-right: 10px !important;
	cursor: pointer !important;
	border-radius: 4px !important;
}

.label-checkbox-active {
	background-color: #f2f2f2 !important ;
}

	
input[type="checkbox"] {
	display: none;
}

input[type="checkbox"] + .label-checkbox {
	background-color: #d7dcde;
	border: 1px solid #d7dcde;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
	padding: 9px;
	border-radius: 3px;
	display: inline-block;
	position: relative;
}

input[type="checkbox"] + .label-checkbox:active, input[type="checkbox"]:checked + .label-checkbox:active {
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

input[type="checkbox"]:disabled + .label-checkbox {
	background-color: #CFD4D6 !important;
	border: 1px solid #CFD4D6 !important;
	cursor: pointer!important;
}


input[type="checkbox"]:checked + .label-checkbox {
	background-color: <?= $color_secundary ?>;
	border: 1px solid <?= $color_secundary ?>;
	box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
	color: #99a1a7;
}

input[type="checkbox"]:checked + .label-checkbox:after {
	content: '\2714';
    font-size: 10px;
    position: absolute;
    top: 12%;
    left: 4px;
    color: white;
}

</style>
