const minify = require('html-minifier').minify;

const COMPRESSION_HEADER = 'X-Prerender-Compression-Ratio';
const options = {
	minifyCSS : true,
	minifyJS : true,
	removeComments : true,
	collapseWhitespace : true,
	preserveLineBreaks : true,
	removeEmptyAttributes : false,
	removeEmptyElements : false,
};

module.exports = {
	pageLoaded(req, res, next) {
		if (!req.prerender.content) {
			return next();
		}

		const sizeBefore = req.prerender.content.toString().length;
		try {
			req.prerender.content = minify(req.prerender.content.toString(), options);
		} catch (e) {
			console.error("There was a problem parsing the HTML. Please request the page manually and check what broke.");
		}
		const sizeAfter = req.prerender.content.toString().length;
		res.setHeader(COMPRESSION_HEADER, ((sizeBefore - sizeAfter) / sizeBefore).toFixed(4));

		next();
	}
};
