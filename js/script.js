'use strict'
window.onload = function (){
	let input  = document.querySelectorAll('input[type="text"]');

	for(let i = 0 ; i< input.length; i++) {
		input[i].addEventListener('blur',checkRegExp);
	}

	function checkRegExp() {
		let regExp = [['username', /^\w{2,10}\D$/ ,'Username is incorrect'],
					['number', /^\d{1,10}$/,'Number is incorrect'],
					['monthnum', /^\d{1,2}$/,'Monthnum is incorrect']];

		for (let i = 0; i<regExp.length; i++) {
			if (regExp[i][0] == this.name){
				if (regExp[i][1].test(this.value)) {
					console.log(true)
				}
				else {
					error_msg.querySelector('p').innerHTML = regExp[i][2];
					setTimeout(function(){
						error_msg.querySelector('p').innerHTML = "";
					},3000)
					this.focus();
				}
			}
		}
	}
}
