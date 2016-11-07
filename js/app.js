;(() => {
	const xhrDone = 4;
	const OK = 200;

	let xhrRequest = (method, url, callback) => {
		var xhr = new XMLHttpRequest();
		xhr.open(method, url);
		xhr.send(null);
		xhr.onreadystatechange = callback(xhr);
	}

	const anchors = document.getElementsByTagName('a');

	for (let i = 0; i < anchors.length; i++) {
	    let elem = anchors[i];
	    elem.onclick = (e) => {
			let target = e.target;
			if (e.target.nodeName !== "A") {
				target = e.target.parentElement;
			}
			if (e.nodeName === "A") {
				target = e;
			}
			xhrRequest('GET', `${target.href}?from=js`, (xhr) => () => {
				if (xhr.readyState === xhrDone) {
					let result = '';
					if (xhr.status === OK) {
						result = xhr.responseText;
					} else {
						console.log('Error: ' + xhr.status);
						result = '<section><h1>Error occurred</h1></section>';
					}
					document.getElementById('root').innerHTML = result;
				}
			});
	        return false;
	    };
	}
})();
