// Modify settings for Core blocks
wp.hooks.addFilter(
	"blocks.registerBlockType",
	"my/change_alignment",
	(settings, name) => {
		switch (name) {
			// These blocks only allowed to use Wide alignment
			case "core/paragraph":
			case "core/list":
			case "core/gallery":
			case "core/code":
			case "core/verse":
			case "core/preformatted":
			case "core/table":
			case "core/pullquote":
			case "core/heading":
				return lodash.assign({}, settings, {
					supports: lodash.assign({}, settings.supports, {
						align: ["wide", "full"],
					}),
				});

			// Has no alignment choice
			case "core/file":
			case "core/audio":
				return lodash.assign({}, settings, {
					supports: lodash.assign({}, settings.supports, {
						align: [],
					}),
				});

			// Only allow Center and Wide
			case "core/buttons":
				return lodash.assign({}, settings, {
					supports: lodash.assign({}, settings.supports, {
						align: ["center", "wide"],
					}),
				});

			// Only allow Center
			case "core/social-links":
				return lodash.assign({}, settings, {
					supports: lodash.assign({}, settings.supports, {
						align: ["center"],
					}),
				});

			// Default to Wide
			//   Existing Columns that isn't Wide will have "invalid content" error.
			//   Clicking "Attempt Block Recovery" will fix it, but it becomes Wide.
			// case "core/columns":
			// 	return lodash.assign({}, settings, {
			// 		attributes: lodash.assign({}, settings.attributes, {
			// 			align: {
			// 				type: "string",
			// 				default: "wide",
			// 			},
			// 		}),
			// 	});

			// Default to Full
			//   Existing Group that isn't Full will have "invalid content" error.
			//   Clicking "Attempt Block Recovery" will fix it, but it becomes Full.
			case "core/cover":
				return lodash.assign({}, settings, {
					attributes: lodash.assign({}, settings.attributes, {
						align: {
							type: "string",
							default: "full",
						},
					}),
				});
			
		}
		return settings;
	}
);
