import fs from "node:fs";
import path from "node:path";
import { fileURLToPath } from "node:url";

import {
	generateTheme,
	serializeTheme
} from "./build-theme-json.js";

const currentFile = fileURLToPath(import.meta.url);
const currentDirectory = path.dirname(currentFile);
const projectRoot = path.resolve(currentDirectory, "..");
const themePath = path.join(projectRoot, "theme.json");

try {
	if (!fs.existsSync(themePath)) {
		throw new Error(
			"theme.json does not exist. Run npm run build:theme first."
		);
	}

	const expectedTheme = serializeTheme(generateTheme());
	const currentTheme = fs.readFileSync(themePath, "utf8");

	if (currentTheme !== expectedTheme) {
		console.error(
			[
				"✗ theme.json is out of sync with its source files.",
				"",
				"Do not edit theme.json directly.",
				"Run npm run build:theme, then review the generated changes."
			].join("\n")
		);

		process.exit(1);
	}

	console.log("✓ theme.json matches the Meybell source files.");
} catch (error) {
	console.error(`✗ Theme check failed.\n${error.message}`);
	process.exit(1);
}
