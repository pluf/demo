module.exports = (healthcheckEndpoint) => {
	return {
		requestReceived(req, res, next) {
			if (req.prerender.url === healthcheckEndpoint) {
				res.send(200, 'OK');
				return;
			}
			return next();
		}
	};
};
