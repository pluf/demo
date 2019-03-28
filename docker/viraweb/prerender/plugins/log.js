const shouldJsonLog = process.env.CUSTOM_LOG === 'json';
const shouldHumanLog = process.env.CUSTOM_LOG === 'human';

module.exports = {
	requestReceived(req, res, next) {
		req.prerender.start = new Date();
		next();
	},
	pageLoaded(req, res, next) {
		const logging = {
			datetime : new Date().toISOString(),
			url : req.prerender.url,
			duration : new Date() - req.prerender.start
		};

		if (shouldJsonLog) {
			console.log(JSON.stringify(logging));
		}
		else if (shouldHumanLog) {
			console.log(`${logging.datetime} - A request for url ${logging.url} took ${logging.duration}ms`);
		}
		next();
	}
};
