/**
 * Remove script tags
 * 
 * @author Mostafa Barmshory(mostafa.barmshory@gmail.com)
 */
module.exports = {
	pageLoaded: (req, res, next) => {
		if (!req.prerender.content || req.prerender.renderType != 'html') {
			return next();
		}

		var content = req.prerender.content.toString();
		var matches = null;
		var patterns = [
			/<script(?:[^>]*?)>(?:.*?)<\/script>/gis,
			/<link[^>]+?rel="import"[^>]*?>/igs,
		];

		for(let j = 0; j < patterns.length; j++){
			matches = content.match(patterns[j]);
			for (let i = 0; matches && i < matches.length; i++) {
				content = content.replace(matches[i], '');
			}
		}

		req.prerender.content = content;
		next();
	}
};