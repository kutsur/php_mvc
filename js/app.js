;(() => {
	const xhrDone = 4;
	const OK = 200;
	const NOTFOUND = 404;

	window.onpopstate = (e) => {
		if (e.state) {
		    document.getElementById("root").innerHTML = e.state.html;
		    document.title = e.state.pageTitle;
		}
	};

	let xhrRequest = (method, url, callback) => {
		var xhr = new XMLHttpRequest();
		xhr.open(method, url, true);
		xhr.send();
		xhr.onreadystatechange = callback(xhr);
	};

	let handlerRegistrar = () => {
		const anchors = document.getElementsByTagName('a');

		for (let i = 0; i < anchors.length; i++) {
		    const elem = anchors[i];
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
						if (xhr.status === OK || xhr.status === NOTFOUND) {
							result = JSON.parse(xhr.responseText);
						} else {
							console.log('Error: ' + xhr.status);
							result = '<section><h1>Error occurred</h1></section>';
						}
						const root = document.getElementById('root');
						if (root.innerHTML !== result.html) {
							root.innerHTML = result.html;
							document.title = result.title;
							handlerRegistrar();
							window.history.pushState({
								"html": result.html,
								"pageTitle": result.title,
							},"", target.href);
						}
					}
				});
		        return false;
		    };
		}
	};
	handlerRegistrar();
})();
