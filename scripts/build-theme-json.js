import fs from "node:fs";
import path from "node:path";
import { fileURLToPath, pathToFileURL } from "node:url";

const currentFile = fileURLToPath(import.meta.url);
const currentDirectory = path.dirname(currentFile);
const projectRoot = path.resolve(currentDirectory, "..");

const tokensPath = path.join(projectRoot, "design-tokens.json");
const baseThemePath = path.join(projectRoot, "config", "theme.base.json");
const outputPath = path.join(projectRoot, "theme.json");

function readJson(filePath) {
	try {
		return JSON.parse(fs.readFileSync(filePath, "utf8"));
	} catch (error) {
		throw new Error(`Could not read JSON file: ${filePath}\n${error.message}`);
	}
}

function presetReference(type, slug) {
	return `var:preset|${type}|${slug}`;
}

export function generateTheme() {
	const tokens = readJson(tokensPath);
	const baseTheme = readJson(baseThemePath);

	const colorPalette = tokens.color.palette.map((color) => ({
		slug: color.slug,
		name: color.name,
		color: color.value
	}));

	const fontFamilies = tokens.typography.fontFamilies.map((font) => ({
		slug: font.slug,
		name: font.name,
		fontFamily: font.fontFamily
	}));

	const fontSizes = tokens.typography.fontSizes.map((size) => ({
		slug: size.slug,
		name: size.name,
		size: size.size
	}));

	const spacingSizes = tokens.spacing.scale.map((space) => ({
		slug: space.slug,
		name: space.name,
		size: space.size
	}));

	const colorRoles = tokens.color.roles;
	const typeRoles = tokens.typography.roles;

	return {
		...baseTheme,

		settings: {
			...baseTheme.settings,

			color: {
				...baseTheme.settings.color,
				palette: colorPalette
			},

			layout: {
				contentSize: tokens.layout.contentSize,
				wideSize: tokens.layout.wideSize
			},

			spacing: {
				...baseTheme.settings.spacing,
				spacingSizes
			},

			typography: {
				...baseTheme.settings.typography,
				fontFamilies,
				fontSizes
			}
		},

		styles: {
			...baseTheme.styles,

			color: {
				background: presetReference("color", colorRoles.canvas),
				text: presetReference("color", colorRoles.text)
			},

			spacing: {
				blockGap: tokens.spacing.blockGap
			},

			typography: {
				fontFamily: presetReference("font-family", typeRoles.body),
				fontSize: presetReference("font-size", "medium"),
				lineHeight: tokens.typography.lineHeight.body
			},

			elements: {
				...baseTheme.styles.elements,

				heading: {
					color: {
						text: presetReference("color", colorRoles.text)
					},
					typography: {
						fontFamily: presetReference(
							"font-family",
							typeRoles.heading
						),
						fontWeight: tokens.typography.fontWeight.regular,
						lineHeight: tokens.typography.lineHeight.tight
					}
				},

				link: {
					...baseTheme.styles.elements.link,
					color: {
						text: presetReference("color", colorRoles.text)
					}
				},

				button: {
					border: {
						radius: tokens.shape.radius.none
					},
					color: {
						background: presetReference("color", colorRoles.accent),
						text: presetReference("color", colorRoles.text)
					},
					typography: {
						fontFamily: presetReference(
							"font-family",
							typeRoles.interface
						),
						fontWeight: tokens.typography.fontWeight.semibold
					}
				}
			}
		}
	};
}

export function serializeTheme(theme) {
	return `${JSON.stringify(theme, null, 2)}\n`;
}

export function writeTheme() {
	const theme = generateTheme();
	fs.writeFileSync(outputPath, serializeTheme(theme), "utf8");

	console.log("✓ theme.json generated from Meybell design tokens.");
}

const wasRunDirectly =
	process.argv[1] &&
	import.meta.url === pathToFileURL(path.resolve(process.argv[1])).href;

if (wasRunDirectly) {
	try {
		writeTheme();
	} catch (error) {
		console.error(`✗ Theme build failed.\n${error.message}`);
		process.exit(1);
	}
}
