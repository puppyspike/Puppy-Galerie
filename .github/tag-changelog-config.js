module.exports = {
  types: [
	{ types: ["feat", "feature"], label: "🎉 Neue Funktionen" },
	{ types: ["fix", "bugfix"], label: "🐛 Bugfixes" },
	{ types: ["improvements", "enhancement"], label: "🔨 Verbesserungen" },
	{ types: ["perf"], label: "🏎️ Performance Improvements" },
	{ types: ["build", "ci"], label: "🏗️ Build System" },
	{ types: ["refactor"], label: "🪚 Refactors" },
	{ types: ["doc", "docs"], label: "📚 Dokumentation Änderungen" },
	{ types: ["test", "tests"], label: "🔍 Tests" },
	{ types: ["style"], label: "💅 Änderungen am Code-Stil" },
	{ types: ["clean"], label: "🧹 Aufräumen" },
	{ types: ["other"], label: "Sonstige Änderungen" },
  ],

  excludeTypes: ["other"],

  renderTypeSection: function (label, commits) {
	let text = `\n## ${label}\n`;

	commits.forEach((commit) => {
	  text += `- ${commit.subject}\n`;
	});

	return text;
  },

  renderChangelog: function (release, changes) {
	const now = new Date();
	return `# ${release} - ${now.toISOString().substr(0, 10)}\n` + changes + "\n\n";
  },
};
