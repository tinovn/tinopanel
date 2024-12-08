ace.define(
    "ace/theme/tino",
    ["require", "exports", "module", "ace/lib/dom"],
    function (require, exports) {
        (exports.isDark = true),
            (exports.cssClass = "ace-tino rounded-lg w-full"),
            (exports.cssText = `
        .ace-tino .ace_scrollbar::-webkit-scrollbar {  width: 12px;}
        .ace-tino .ace_scrollbar::-webkit-scrollbar-track {  background: #111827;}
        .ace-tino .ace_scrollbar::-webkit-scrollbar-thumb {  background: #374151;  border-radius: 4px;}
        .ace-tino .ace_gutter {background: #151c27;color: rgb(128,145,160)}
        .ace-tino .ace_print-margin {width: 1px;background: #555555}
        .ace-tino {background-color: #0f172a;color: #F9FAFB}
        .ace-tino .ace_cursor {color: #F9FAFB}
        .ace-tino .ace_marker-layer .ace_selection {background: rgba(179, 101, 57, 0.75)}
        .ace-tino.ace_multiselect .ace_selection.ace_start {box-shadow: 0 0 3px 0px #002240;}
        .ace-tino .ace_marker-layer .ace_step {background: rgb(127, 111, 19)}
        .ace-tino .ace_marker-layer .ace_bracket {margin: -1px 0 0 -1px;border: 1px solid rgba(255, 255, 255, 0.15)}
        .ace-tino .ace_marker-layer .ace_active-line {background: rgba(24, 182, 155, 0.10)}
        .ace-tino .ace_gutter-active-line {background-color: rgba(0, 0, 0, 0.35)}
        .ace-tino .ace_marker-layer .ace_selected-word {border: 1px solid rgba(179, 101, 57, 0.75)}
        .ace-tino .ace_invisible {color: rgba(255, 255, 255, 0.15)}
        .ace-tino .ace_keyword,.ace-tino .ace_meta {color: #FF9D00}
        .ace-tino .ace_constant,.ace-tino .ace_constant.ace_character,.ace-tino .ace_constant.ace_character.ace_escape,.ace-tino .ace_constant.ace_other {color: #FF628C}
        .ace-tino .ace_invalid {color: #F8F8F8;background-color: #800F00}
        .ace-tino .ace_support {color: #80FFBB}
        .ace-tino .ace_support.ace_constant {color: #EB939A}
        .ace-tino .ace_fold {background-color: #FF9D00;border-color: #F9FAFB}
        .ace-tino .ace_support.ace_function {color: #FFB054}
        .ace-tino .ace_storage {color: #FFEE80}
        .ace-tino .ace_entity {color: #FFDD00}
        .ace-tino .ace_string {color: #7cd827}
        .ace-tino .ace_string.ace_regexp {color: #80FFC2}
        .ace-tino .ace_comment {font-style: italic;color: #6B7280}
        .ace-tino .ace_heading,.ace-tino
        .ace_markup.ace_heading {color: #C8E4FD;background-color: #001221}
        .ace-tino .ace_list,.ace-tino .ace_markup.ace_list {background-color: #130D26}
        .ace-tino .ace_variable {color: #CCCCCC}
        .ace-tino .ace_variable.ace_language {color: #FF80E1}
        .ace-tino .ace_meta.ace_tag {color: #9EFFFF}
        .ace-tino .ace_indent-guide {background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAACCAYAAACZgbYnAAAAEklEQVQImWNgYGBgYHCLSvkPAAP3AgSDTRd4AAAAAElFTkSuQmCC) right repeat-y}
    `);

        var dom = require("../lib/dom");
        dom.importCssString(exports.cssText, exports.cssClass);
    },
);
