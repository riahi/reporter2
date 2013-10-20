SyntaxHighlighter.brushes.Radiology = function ()
{
	var funcs = 'indication';
	var keywords = 'technique';
	var operators = 'comparison';
	var findings = 'abdomen: liver: gallbladder: pancreas: spleen: adrenals: kidneys: retroperitoneum: pelvis:';

	this.regexList = [
		{ regex: /^INDICATIONS?:\s?\s?.+\s?\s?/gm, css: 'indication'},
		{ regex: /^TECHNIQUE:\s?\s?.+\s?\s?/gmi, css: 'technique'},
		{ regex: /^COMPARISON:[\s\S]+?(?=.+\:)/gmi, css: 'comparison'},
		{ regex: /^FINDINGS:[\s\S]+(?=.*IMPRESSION)/gmi, css: 'findings'},
		//{ regex: /^(abdomen:|liver:|gallbladder:|pancreas:|spleen:|adrenals:|kidneys:|retroperitoneum:|pelvis:|visualized\sgi\stract:|biliary\stree:|mrcp:).+/gmi, css: 'findings'},
		{ regex: /^IMPRESSION:[\s\S]+/gmi, css: 'impression'}
		//{ regex: new RegExp(this.getKeywords(findings), 'gmi'), css: 'findings'},
		];
};

SyntaxHighlighter.brushes.Radiology.prototype = new SyntaxHighlighter.Highlighter();
SyntaxHighlighter.brushes.Radiology.aliases = ['rads', 'radiology'];