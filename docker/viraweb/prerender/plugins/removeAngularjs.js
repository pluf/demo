/**
 * Remove Angular tags
 * 
 * Some tags are used in Angularjs and is not useful in the SEO. For example the
 * following DIV
 * 
 * <div ng-if="ctrl.isPartEnable()">Hi</div>
 * 
 * is equal to:
 * 
 * <div>Hi</div>
 * 
 * This plagin remove Angularjs tags.
 * 
 * @see https://docs.angularjs.org/api/ng/directive
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
				/<ng-md-icon(?:[^>]*?)>(?:(?!<\/ng-md-icon>).)*<\/ng-md-icon>/gis,
				/<wb-icon(?:[^>]*?)>(?:(?!<\/wb-icon>).)*<\/wb-icon>/gis,
				
				// move to angular
				/(?:\s)+ng-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+data-ng-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+transclude=\"(?:[^\"]*)\"/gis,

				// move to angular-material design
				/(?:\s)+md-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+data-md-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+layout=\"(?:[^\"]*)\"/gis,
				/(?:\s)+layout-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+flex=\"(?:[^\"]*)\"/gis,
				/(?:\s)+flex-(?:[^=]+)=\"(?:[^\"]*)\"/gis,

				// TODO: maso: may application
				/(?:\s)+wb-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+data-wb-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+translate=\"(?:[^\"]*)\"/gis,

				/(?:\s)+dnd-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+data-dnd-(?:[^=]+)=\"(?:[^\"]*)\"/gis,

				/(?:\s)+ui-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
				/(?:\s)+data-ui-(?:[^=]+)=\"(?:[^\"]*)\"/gis,
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