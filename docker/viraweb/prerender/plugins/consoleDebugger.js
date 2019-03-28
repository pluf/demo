function determineLogger(type) {
	switch (type) {
		case 'log':
			return console.log;
		case 'warning':
			return console.warn;
		case 'error':
			return console.error;
		default:
			const possible = console[type];
			if (typeof possible !== "undefined") {
				return possible;
			}
		// Let it fall through
	}
	console.warn(`Logger "${type}" not implemented! Falling back to console.log`);
	return console.log;
}

module.exports = {
	tabCreated(req, _res, next) {
		const Page = req.prerender.tab.Page;
		const Runtime = req.prerender.tab.Runtime;
		Promise.all([Runtime.enable(), Page.enable()]).then(() => {
			Runtime.consoleAPICalled(({type, args}) => {
				const toLog = ["Page log", ...args.map(e => e.value)];
				determineLogger(type)(toLog);
			});

			next();
		});
	}
};
