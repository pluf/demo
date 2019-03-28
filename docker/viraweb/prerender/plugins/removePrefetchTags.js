const PREFETCH_LINK_REGEX = /<link(?:.*?) rel="prefetch"(?:.*?)\\?>/gi;

module.exports = {
	pageLoaded: (req, res, next) => {
		if (!req.prerender.content || req.prerender.renderType !== 'html') {
			return next();
		}

		const matches = req.prerender.content.toString().match(PREFETCH_LINK_REGEX);
		for (let i = 0; matches && i < matches.length; i++) {
			// Remove all occurrences of this link tag
			if (!matches[i].includes('application/ld+json')) {
				req.prerender.content = req.prerender.content.toString().replace(matches[i], '');
			}
		}

		next();
	}
};
